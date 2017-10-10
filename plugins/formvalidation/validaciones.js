$(document).ready(function() {
	//Aqui van todos los componentes 
	var controles = {
		salariominimo: {
		  	validators: {
		      	notEmpty: {
		          	message: 'El campo no puede estar vacio'
		      	},
            regexp: {
                regexp: /^[0-9]+$/,
                message: 'solo puede contener números'
            }
		  	}
		},
		auxiliotransporte: {
		  	validators: {
		      	notEmpty: {
		          	message: 'El campo no puede estar vacio'
		      	},
            regexp: {
                regexp: /^[0-9]+$/,
                message: 'solo puede contener números'
            }
		  	}
		},
		cesantias: {
		  	validators: {
		      	notEmpty: {
		          	message: 'El campo no puede estar vacio'
		      	},
            numeric: {
                message: 'El campo es numerico con decimal punto',
                // The default separators
                thousandsSeparator: '',
                decimalSeparator: '.'
            }
		  	}
		},
		interescesantias: {
		  	validators: {
		      	notEmpty: {
		          	message: 'El campo no puede estar vacio'
		      	},
            numeric: {
                  message: 'El campo es numerico con decimal punto',
                  // The default separators
                  thousandsSeparator: '',
                  decimalSeparator: '.'
              }
		  	}
		},
		primabasica: {
		  	validators: {
		      	notEmpty: {
		          	message: 'El campo no puede estar vacio'
		      	},
            numeric: {
                  message: 'El campo es numerico con decimal punto',
                  // The default separators
                  thousandsSeparator: '',
                  decimalSeparator: '.'
              }
		  	}
		},
		vacaciones: {
		  	validators: {
		      	notEmpty: {
		          	message: 'El campo no puede estar vacio'
		      	},
            numeric: {
                  message: 'El campo es numerico con decimal punto',
                  // The default separators
                  thousandsSeparator: '',
                  decimalSeparator: '.'
              }
		  	}
		},
		senaempleador: {
		  	validators: {
		      	notEmpty: {
		          	message: 'El campo no puede estar vacio'
		      	},
            numeric: {
                  message: 'El campo es numerico con decimal punto',
                  // The default separators
                  thousandsSeparator: '',
                  decimalSeparator: '.'
              }
		  	}
		},
		icbfempleador: {
		  	validators: {
		      	notEmpty: {
		          	message: 'El campo no puede estar vacio'
		      	},
            numeric: {
                  message: 'El campo es numerico con decimal punto',
                  // The default separators
                  thousandsSeparator: '',
                  decimalSeparator: '.'
              }
		  	}
		},
		saludtrabajador: {
		  	validators: {
		      	notEmpty: {
		          	message: 'El campo no puede estar vacio'
		      	},
            numeric: {
                  message: 'El campo es numerico con decimal punto',
                  // The default separators
                  thousandsSeparator: '',
                  decimalSeparator: '.'
              }
		  	}
		},
		cajaempleador: {
		  	validators: {
		      	notEmpty: {
		          	message: 'El campo no puede estar vacio'
		      	},
            numeric: {
                  message: 'El campo es numerico con decimal punto',
                  // The default separators
                  thousandsSeparator: '',
                  decimalSeparator: '.'
              }
		  	}
		},
		pensiontrabajador: {
		  	validators: {
		      	notEmpty: {
		          	message: 'El campo no puede estar vacio'
		      	},
            numeric: {
                  message: 'El campo es numerico con decimal punto',
                  // The default separators
                  thousandsSeparator: '',
                  decimalSeparator: '.'
              }
		  	}
		},
		saludempleador: {
		  	validators: {
		      	notEmpty: {
		          	message: 'El campo no puede estar vacio'
		      	},
            numeric: {
                  message: 'El campo es numerico con decimal punto',
                  // The default separators
                  thousandsSeparator: '',
                  decimalSeparator: '.'
              }
		  	}
		},
		pensionempleador: {
		  	validators: {
		      	notEmpty: {
		          	message: 'El campo no puede estar vacio'
		      	},
            numeric: {
                  message: 'El campo es numerico con decimal punto',
                  // The default separators
                  thousandsSeparator: '',
                  decimalSeparator: '.'
              }
		  	}
		},
		riesgosempleador: {
		  	validators: {
		      	notEmpty: {
		          	message: 'El campo no puede estar vacio'
		      	},
            numeric: {
                  message: 'El campo es numerico con decimal punto',
                  // The default separators
                  thousandsSeparator: '',
                  decimalSeparator: '.'
              }
		  	}
		},
		slllllllll: {
			trigger: 'blur',
		  	validators: {
		      	notEmpty: {
		          	message: 'La Vinculación es requerida y no puede estar vacio'
		      	},
		      	remote: {
                      message: 'Ya existe! un tipo con ese nombre.',
                      url: 'classes/data.php',
                      type: 'POST'
                  }
		  	}
		},
		tipomarca: {
			trigger: 'blur',
		  	validators: {
		      	notEmpty: {
		          	message: 'La marca es requerida y no puede estar vacio'
		      	},
		      	remote: {
                      message: 'Ya existe! un tipo con ese nombre.',
                      url: 'classes/data.php',
                      type: 'POST'
                  }
		  	}
		},
		codigoprograma: {
			trigger: 'blur',
		  	validators: {
		      	notEmpty: {
		          	message: 'El código es requerido y no puede estar vacio'
		      	},
		      	remote: {
                      message: 'Ya existe! un codigo con ese nombre.',
                      url: 'classes/data.php',
                      type: 'POST'
                  }
		  	}
		},
		descripcionvinculacion: {
		  	validators: {
		      	notEmpty: {
		          	message: 'La Descripción es requerida y no puede estar vacio'
		      	}
		  	}
		},
		tipoprograma: {
		  	validators: {
		      	notEmpty: {
		          	message: 'El campo es requerido y no puede estar vacio'
		      	}
		  	}
		},
		descripcionmarca: {
		  	validators: {
		      	notEmpty: {
		          	message: 'La Descripción es requerida y no puede estar vacio'
		      	}
		  	}
		},
		papellido: {
		  	validators: {
		      	notEmpty: {
		          	message: 'El Primer Apellido es requerido y no puede estar vacio'
		      	},
		      	stringLength: {
		          	min: 2,
		          	max: 40,
		          	message: 'La longitud del campo debe ser mayor a 2 caracteres y minimo 40.'
		      	}
		  	}
		},
		sapellido: {
		  	validators: {
		      	notEmpty: {
		          	message: 'El Segundo Apellido es requerido y no puede estar vacio'
		      	},
		      	stringLength: {
		          	min: 2,
		          	max: 40,
		          	message: 'La longitud del campo debe ser mayor a 2 caracteres y minimo 40.'
		      	}
		  	}
		},
		pnombre: {
		  	validators: {
		      	notEmpty: {
		          	message: 'El Primer Nombre es requerido y no puede estar vacio'
		      	},
		      	stringLength: {
		          	min: 2,
		          	max: 30,
		          	message: 'La longitud del campo debe ser mayor a 2 caracteres y minimo 30.'
		      	}
		  	}
		},
		nombregrupo:{
			trigger: 'blur',
			validators:{
				notEmpty:{
					message: 'El campo es requerido y no puede estar vacio.'
				},
				remote: {
                      message: 'Ya existe! Item con ese nombre.',
                      url: 'classes/data.php',
                      type: 'POST'
                  }
			}
		},
		'listadispositivos[]':{
			trigger: 'blur',
			validators:{
				callback: {
                      message: 'Por favor seleccione almenos un dispositivo',
                      callback: function(value, validator, $field) {
                          // Get the selected options
                          var options = validator.getFieldElements('listadispositivos[]').val();
                          return (options != null && options.length >= 1);
                      }
                  }
			}
		},
		buscarpersona:{
			trigger: 'blur',
			validators:{
				notEmpty:{
					message: 'El campo es requerido y no puede estar vacio.'
				},
				remote: {
                      message: 'No existe ningún registro con esa identificación.',
                      url: 'classes/data.php',
                      type: 'POST'
                  }
			}
		},
		identificacion: {
			trigger: 'blur',
		  	validators: {
		      	notEmpty: {
		          	message: 'El número de identificación es requerido y no puede estar vacio.'
		      	},
		      	remote: {
                      message: 'Ya existe! un miembro con esta identificación.',
                      url: 'classes/data.php',
                      type: 'POST'
                  },
		      	stringLength: {
		          	min: 6,
		          	max: 12,
		          	message: 'La longitud del campo debe ser mayor a 6 caracteres y minimo 12.'
		      	},
		      	regexp: {
                      regexp: /^[0-9]+$/,
                      message: 'solo puede contener números'
                  }
		  	}
		},
		usu_identificacion: {
			trigger: 'blur',
		  	validators: {
		      	notEmpty: {
		          	message: 'El número de identificación es requerido y no puede estar vacio.'
		      	},
		      	remote: {
                      message: 'Ya existe! un usuario con esta identificación.',
                      url: 'classes/data.php',
                      type: 'POST'
                  },
		      	stringLength: {
		          	min: 6,
		          	max: 12,
		          	message: 'La longitud del campo debe ser mayor a 6 caracteres y minimo 12.'
		      	},
		      	regexp: {
                      regexp: /^[0-9]+$/,
                      message: 'solo puede contener números'
                  }
		  	}
		},
		serial: {
			trigger: 'blur',
		  	validators: {
		      	notEmpty: {
		          	message: 'El campo Serial no puede estar vacio.'
		      	},
		      	remote: {
                      message: 'Ya existe! un dispositivo con el mismo serial.',
                      url: 'classes/data.php',
                      type: 'POST'
                  },
		      	stringLength: {
		          	min: 4,
		          	max: 30,
		          	message: 'La longitud del campo debe ser mayor a 4 caracteres'
		      	},
		      	regexp: {
		          	regexp: /^[a-zA-Z0-9_]+$/,
		          	message: 'Solo se permiten Caracteres Alfanumerico'
		      	}
		  	}
		},
		otroserial: {
			trigger: 'blur',
		  	validators: {
		      	remote: {
                      message: 'Ya existe! un dispositivo con el mismo serial.',
                      url: 'classes/data.php',
                      type: 'POST'
                  },
		      	stringLength: {
		          	min: 4,
		          	max: 30,
		          	message: 'La longitud del campo debe ser mayor a 4 caracteres'
		      	},
		      	regexp: {
		          	regexp: /^[a-zA-Z0-9_]+$/,
		          	message: 'Solo se permiten Caracteres Alfanumerico'
		      	},
		      	different: {
                          field: 'serial',
                          message: 'Este serial no puede ser igual a al serial inicial.'
                      }
		  	}
		}, 
		username: {
		  	validators: {
		      	notEmpty: {
		          	message: 'El campo Usuario no puede estar vacio.'
		      	},
		      	stringLength: {
		          	min: 6,
		          	max: 30,
		          	message: 'El campo Uuario no debe superar los 30 caracteres y mínimo 6.'
		      	},
		      	regexp: {
		          	regexp: /^[a-zA-Z0-9_]+$/,
		          	message: 'El usuario solo puede ser Alfanumerico, con minusculas y mayusculas.'
		      	}
		  	}
		},
		clave: {
		  	validators: {
		      	stringLength: {
		          	min: 6,
		          	max: 50,
		          	message: 'La Contraseña debe tener mínimo 6 caracteres y máximo 50.'
		      	},
		  	}
		},
		'campo[]': {
		  	validators: {
		      	notEmpty: {
		          	message: 'La casilla está vacía, esperando lectura de codigo de barras'
		      	},
		      	stringLength: {
		          	min: 6,
		          	max: 30,
		          	message: 'El campo no debe superar los 30 Caracteres'
		      	}
		  	}
		},
		elim: {
		  	validators: {
		      	notEmpty: {
		          	message: 'El campo no puede estar vacio'
		      	},
		      	stringLength: {
		          	max: 9,
		          	message: 'La longitud del campo debe ser minimo 9 caracteres.'
		      	}
		  	}
		}
	};


	$('#p').formValidation({
	  // I am validating Bootstrap form
		  framework: 'bootstrap',

		  // Feedback icons
		  icon: {
		      	valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
		  },

		  // List of fields and their validation rules
		  fields: 
		      controles
	  
	});


	// Sin ICONOS
	$('#normatividad_1, #normatividad_2, #normatividad_3, #normatividad_4, #normatividad_5').formValidation({
	  // I am validating Bootstrap form
		  framework: 'bootstrap',

		  // Feedback icons
		  icon: {
		      	valid: 'glyphicon ',
	            invalid: 'glyphicon ',
	            validating: 'glyphicon '
		  },

		  // List of fields and their validation rules
		  fields: 
		      controles
	  
	})
	.on('err.field.fv', function(e, data) {
    $(this).find('.btnguardar').attr('disabled','disabled');
  })
  .on('success.field.fv', function(e, data) {
  	$(this).find('.btnguardar').removeAttr('disabled');
  });
});