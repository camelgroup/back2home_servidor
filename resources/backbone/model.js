/**
 * backbone model definitions for PETFINDER
 */

/**
 * Use emulated HTTP if the server doesn't support PUT/DELETE or application/json requests
 */
Backbone.emulateHTTP = false;
Backbone.emulateJSON = false;

var model = {};

/**
 * long polling duration in miliseconds.  (5000 = recommended, 0 = disabled)
 * warning: setting this to a low number will increase server load
 */
model.longPollDuration = 5000;

/**
 * whether to refresh the collection immediately after a model is updated
 */
model.reloadCollectionOnModelUpdate = true;


/**
 * a default sort method for sorting collection items.  this will sort the collection
 * based on the orderBy and orderDesc property that was used on the last fetch call
 * to the server. 
 */
model.AbstractCollection = Backbone.Collection.extend({
	totalResults: 0,
	totalPages: 0,
	currentPage: 0,
	pageSize: 0,
	orderBy: '',
	orderDesc: false,
	lastResponseText: null,
	lastRequestParams: null,
	collectionHasChanged: true,
	
	/**
	 * fetch the collection from the server using the same options and 
	 * parameters as the previous fetch
	 */
	refetch: function() {
		this.fetch({ data: this.lastRequestParams })
	},
	
	/* uncomment to debug fetch event triggers
	fetch: function(options) {
            this.constructor.__super__.fetch.apply(this, arguments);
	},
	// */
	
	/**
	 * client-side sorting baesd on the orderBy and orderDesc parameters that
	 * were used to fetch the data from the server.  Backbone ignores the
	 * order of records coming from the server so we have to sort them ourselves
	 */
	comparator: function(a,b) {
		
		var result = 0;
		var options = this.lastRequestParams;
		
		if (options && options.orderBy) {
			
			// lcase the first letter of the property name
			var propName = options.orderBy.charAt(0).toLowerCase() + options.orderBy.slice(1);
			var aVal = a.get(propName);
			var bVal = b.get(propName);
			
			if (isNaN(aVal) || isNaN(bVal)) {
				// treat comparison as case-insensitive strings
				aVal = aVal ? aVal.toLowerCase() : '';
				bVal = bVal ? bVal.toLowerCase() : '';
			} else {
				// treat comparision as a number
				aVal = Number(aVal);
				bVal = Number(bVal);
			}
			
			if (aVal < bVal) {
				result = options.orderDesc ? 1 : -1;
			} else if (aVal > bVal) {
				result = options.orderDesc ? -1 : 1;
			}
		}
		
		return result;

	},
	/**
	 * override parse to track changes and handle pagination
	 * if the server call has returned page data
	 */
	parse: function(response, options) {

		// the response is already decoded into object form, but it's easier to
		// compary the stringified version.  some earlier versions of backbone did
		// not include the raw response so there is some legacy support here
		var responseText = options && options.xhr ? options.xhr.responseText : JSON.stringify(response);
		this.collectionHasChanged = (this.lastResponseText != responseText);
		this.lastRequestParams = options ? options.data : undefined;
		
		// if the collection has changed then we need to force a re-sort because backbone will
		// only resort the data if a property in the model has changed
		if (this.lastResponseText && this.collectionHasChanged) this.sort({ silent:true });
		
		this.lastResponseText = responseText;
		
		var rows;

		if (response.currentPage) {
			rows = response.rows;
			this.totalResults = response.totalResults;
			this.totalPages = response.totalPages;
			this.currentPage = response.currentPage;
			this.pageSize = response.pageSize;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		} else {
			rows = response;
			this.totalResults = rows.length;
			this.totalPages = 1;
			this.currentPage = 1;
			this.pageSize = this.totalResults;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}

		return rows;
	}
});

/**
 * Imagen Backbone Model
 */
model.ImagenModel = Backbone.Model.extend({
	urlRoot: 'api/imagen',
	idAttribute: 'pkimagen',
	pkimagen: '',
	ruta: '',
	fkposter: '',
	defaults: {
		'pkimagen': null,
		'ruta': '',
		'fkposter': ''
	}
});

/**
 * Imagen Backbone Collection
 */
model.ImagenCollection = model.AbstractCollection.extend({
	url: 'api/imagenes',
	model: model.ImagenModel
});

/**
 * Mascota Backbone Model
 */
model.MascotaModel = Backbone.Model.extend({
	urlRoot: 'api/mascota',
	idAttribute: 'pkmascota',
	pkmascota: '',
	nombre: '',
	genero: '',
	tamano: '',
	color: '',
	fktipoMascota: '',
	fkraza: '',
	estado: '',
	defaults: {
		'pkmascota': null,
		'nombre': '',
		'genero': '',
		'tamano': '',
		'color': '',
		'fktipoMascota': '',
		'fkraza': '',
		'estado': ''
	}
});

/**
 * Mascota Backbone Collection
 */
model.MascotaCollection = model.AbstractCollection.extend({
	url: 'api/mascotas',
	model: model.MascotaModel
});

/**
 * Notificacion Backbone Model
 */
model.NotificacionModel = Backbone.Model.extend({
	urlRoot: 'api/notificacion',
	idAttribute: 'pknotificacion',
	pknotificacion: '',
	fecha: '',
	hora: '',
	fkusuarioDestino: '',
	fkposter: '',
	visto: '',
	defaults: {
		'pknotificacion': null,
		'fecha': '',
		'hora': '',
		'fkusuarioDestino': '',
		'fkposter': '',
		'visto': ''
	}
});

/**
 * Notificacion Backbone Collection
 */
model.NotificacionCollection = model.AbstractCollection.extend({
	url: 'api/notificaciones',
	model: model.NotificacionModel
});

/**
 * Poster Backbone Model
 */
model.PosterModel = Backbone.Model.extend({
	urlRoot: 'api/poster',
	idAttribute: 'pkposter',
	pkposter: '',
	fkusuario: '',
	fkmascota: '',
	fktipoPoster: '',
    telefono: '',
	latitud: '',
	longitud: '',
	recompensa: '',
	tipoMoneda: '',
	descripcion: '',
	fecha: '',
	hora: '',
	imagen: '',
    mascota_nombre : '',
    mascota_genero : '',
    mascota_tamano : '',
    mascota_color : '',
    mascota_estado : '',
    tipoMascota_nombre : '',
    raza_nombre : '',
    usuario_nombre : '',
    usuario_id_facebook : '',
    usuario_id_firebase : '',
    usuario_nroTelefono : '',
    defaults: {
		'pkposter': null,
		'fkusuario': '',
		'fkmascota': '',
		'fktipoPoster': '',
		'telefono': '',
		'latitud': '',
		'longitud': '',
		'recompensa': '',
		'tipoMoneda': '',
		'descripcion': '',
		'fecha': '',
		'hora': '',
		'imagen': '',
        'mascota_nombre' : '',
        'mascota_genero' : '',
        'mascota_tamano' : '',
        'mascota_color' : '',
        'mascota_estado' : '',
        'tipoMascota_nombre' : '',
        'raza_nombre' : '',
        'usuario_nombre' : '',
        'usuario_id_facebook' : '',
        'usuario_id_firebase' : '',
        'usuario_nroTelefono' : ''
	}
});

/**
 * Poster Backbone Collection
 */
model.PosterCollection = model.AbstractCollection.extend({
	url: 'api/posters',
	model: model.PosterModel
});

/**
 * Raza Backbone Model
 */
model.RazaModel = Backbone.Model.extend({
	urlRoot: 'api/raza',
	idAttribute: 'pkraza',
	pkraza: '',
	nombre: '',
	fktipoMascota: '',
	defaults: {
		'pkraza': null,
		'nombre': '',
		'fktipoMascota': ''
	}
});

/**
 * Raza Backbone Collection
 */
model.RazaCollection = model.AbstractCollection.extend({
	url: 'api/razas',
	model: model.RazaModel
});

/**
 * TipoMascota Backbone Model
 */
model.TipoMascotaModel = Backbone.Model.extend({
	urlRoot: 'api/tipomascota',
	idAttribute: 'pktipoMascota',
	pktipoMascota: '',
	nombre: '',
	defaults: {
		'pktipoMascota': null,
		'nombre': ''
	}
});

/**
 * TipoMascota Backbone Collection
 */
model.TipoMascotaCollection = model.AbstractCollection.extend({
	url: 'api/tipomascotas',
	model: model.TipoMascotaModel
});

/**
 * TipoPoster Backbone Model
 */
model.TipoPosterModel = Backbone.Model.extend({
	urlRoot: 'api/tipoposter',
	idAttribute: 'pktipoPoster',
	pktipoPoster: '',
	nombre: '',
	descripcion: '',
	precio: '',
	tipoMoneda: '',
	defaults: {
		'pktipoPoster': null,
		'nombre': '',
		'descripcion': '',
		'precio': '',
		'tipoMoneda': ''
	}
});

/**
 * TipoPoster Backbone Collection
 */
model.TipoPosterCollection = model.AbstractCollection.extend({
	url: 'api/tipoposters',
	model: model.TipoPosterModel
});

/**
 * Usuario Backbone Model
 */
model.UsuarioModel = Backbone.Model.extend({
	urlRoot: 'api/usuario',
	idAttribute: 'pkusuario',
	pkusuario: '',
	nombre: '',
	ifFirebase: '',
	email: '',
	nrotelefono: '',
	idFacebook: '',
	defaults: {
		'pkusuario': null,
		'nombre': '',
		'idFirebase': '',
		'email': '',
		'nrotelefono': '',
		'idFacebook': ''
	}
});

/**
 * Usuario Backbone Collection
 */
model.UsuarioCollection = model.AbstractCollection.extend({
	url: 'api/usuarios',
	model: model.UsuarioModel
});

/**
 * Afiliado Backbone Model
 */
model.AfiliadoModel = Backbone.Model.extend({
    urlRoot: 'api/afiliado',
    idAttribute: 'pkafiliado',
    pkafiliado: '',
    nombre: '',
    direccion: '',
    latitud: '',
    longitud: '',
    telefono: '',
    descripcion: '',
    fkusuario: '',
    plan: '',
    urlimagen: '',
    defaults: {
        'pkafiliado': null,
        'nombre': '',
        'direccion': '',
        'latitud': '',
        'longitud': '',
        'telefono': '',
        'descripcion': '',
        'fkusuario': '',
        'plan': '',
        'urlimagen': ''
    }
});

/**
 * Afiliado Backbone Collection
 */
model.AfiliadoCollection = model.AbstractCollection.extend({
    url: 'api/afiliados',
    model: model.AfiliadoModel
});

/**
 * ImagenAfiliado Backbone Model
 */
model.ImagenAfiliadoModel = Backbone.Model.extend({
	urlRoot: 'api/imagenafiliado',
	idAttribute: 'pkimagen',
	pkimagen: '',
	ruta: '',
	fkafiliado: '',
	defaults: {
		'pkimagen': null,
		'ruta': '',
		'fkafiliado': ''
	}
});

/**
 * ImagenAfiliado Backbone Collection
 */
model.ImagenAfiliadoCollection = model.AbstractCollection.extend({
	url: 'api/imagenafiliados',
	model: model.ImagenAfiliadoModel
});
