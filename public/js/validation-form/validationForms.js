$(function () {
    $('#formUsersCreate').validate({
        rules: {
            documento: {
                number: true,
                required: true
            },
            nombre: {
                required: true
            },
            apellido: {
                required: true
            },
            password: {
                required: true
            },
            direccion: {
                required: true
            },
            email: {
                required: true
            },
            rol: {
                required: true
            }
        },
        messages: {
            documento: {
                number: "Solo numeros, por favor",
                required: "Este campo es obligatorio"
            },
            nombre: {
                required: "Este campo es obligatorio"
            },
            apellido: {
                required: "Este campo es obligatorio"
            },
            password: {
                required: "Este campo es obligatorio"
            },
            direccion: {
                required: "Este campo es obligatorio"
            },
            email: {
                required: "Este campo es obligatorio"
            },
            rol: {
                required: "Este campo es obligatorio"
            }
        }
    });

    $('#formUsersUpdate').validate({
        rules: {
            documento: {
                number: true,
                required: true
            },
            nombre: "required",
            apellido: {
                required: true
            },
            password: {
                required: true
            },
            direccion: {
                required: true
            },
            email: {
                required: true
            },
            rol: {
                required: true
            }
        },
        messages: {
            documento: {
                number: "Solo numeros, por favor",
                required: "Este campo es obligatorio"
            },
            nombre: {
                required: "Este campo es obligatorio"
            },
            apellido: {
                required: "Este campo es obligatorio"
            },
            password: {
                required: "Este campo es obligatorio"
            },
            direccion: {
                required: "Este campo es obligatorio"
            },
            email: {
                required: "Este campo es obligatorio"
            },
            rol: {
                required: "Este campo es obligatorio"
            }
        }
    });

    $('#formUsuariosCreate').validate({
        rules: {
            documento: {
                number: true,
                required: true,
                minlength: 7
            },
            nombre: "required",
            apellido: {
                required: true
            },
            direccion: {
                required: true
            },
            email: {
                required: true
            },
            perfil: {
                required: true
            }
        },
        messages: {
            documento: {
                number: "Solo numeros, por favor",
                required: "Este campo es obligatorio",
                minlength: "El documento debe tener al menos 7 numeros"
            },
            nombre: {
                required: "Este campo es obligatorio"
            },
            apellido: {
                required: "Este campo es obligatorio"
            },
            direccion: {
                required: "Este campo es obligatorio"
            },
            email: {
                required: "Este campo es obligatorio"
            },
            perfil: {
                required: "Este campo es obligatorio"
            }
        }
    });

    $('#formUsuariosUpdate').validate({
        rules: {
            documento: {
                number: true,
                required: true,
                minlength: 7
            },
            nombre: "required",
            apellido: {
                required: true
            },
            direccion: {required: true},
            email: {required: true},
            perfil: {
                required: true
            }
        },
        messages: {
            documento: {
                number: "Solo numeros, por favor",
                required: "Este campo es obligatorio",
                minlength: "El documento debe tener al menos 7 numeros"
            },
            nombre: {
                required: "Este campo es obligatorio"
            },
            apellido: {
                required: "Este campo es obligatorio"
            },
            direccion: {
                required: "Este campo es obligatorio"
            },
            email: {
                required: "Este campo es obligatorio"
            },
            perfil: {
                required: "Este campo es obligatorio"
            }
        }
    });

    $('#formBookCreate').validate({
        rules: {
            titulo: "required",
            idioma: "required",
            num_paginas:  "required",
            ejemplares: "required",
            isbn:  "required",
            pais_impreso: "required",
            anho_edicion: "required",
            autor_id: "required",
            editorial_id: "required",
            ubicacion_id: "required",
            categoria_id: "required"
        },
        messages: {
            titulo: {
                required: "Este campo es obligatorio"
            },
            idioma: {
                required: "Este campo es obligatorio"
            },
            num_paginas: {
                required: "Este campo es obligatorio"
            },
            ejemplares: {
                required: "Este campo es obligatorio"
            },
            isbn: {
                required: "Este campo es obligatorio"
            },
            pais_impreso: {
                required: "Este campo es obligatorio"
            },
            anho_edicion: {
                required: "Este campo es obligatorio"
            },
            autor_id: {
                required: "Este campo es obligatorio"
            },
            editorial_id: {
                required: "Este campo es obligatorio"
            },
            ubicacion_id: {
                required: "Este campo es obligatorio"
            },
            categoria_id: {
                required: "Este campo es obligatorio"
            }
        }
    });

    $('#formBookUpdate').validate({
        rules: {
            titulo: "required",
            idioma: "required",
            num_paginas:  "required",
            ejemplares: "required",
            isbn:  "required",
            pais_impreso: "required",
            anho_edicion: "required",
            autor_id: "required",
            editorial_id: "required",
            ubicacion_id: "required",
            categoria_id: "required"
        },
        messages: {
            titulo: {
                required: "Este campo es obligatorio"
            },
            idioma: {
                required: "Este campo es obligatorio"
            },
            num_paginas: {
                required: "Este campo es obligatorio"
            },
            ejemplares: {
                required: "Este campo es obligatorio"
            },
            isbn: {
                required: "Este campo es obligatorio"
            },
            pais_impreso: {
                required: "Este campo es obligatorio"
            },
            anho_edicion: {
                required: "Este campo es obligatorio"
            },
            autor_id: {
                required: "Este campo es obligatorio"
            },
            editorial_id: {
                required: "Este campo es obligatorio"
            },
            ubicacion_id: {
                required: "Este campo es obligatorio"
            },
            categoria_id: {
                required: "Este campo es obligatorio"
            }
        }
    });

    $('#formCategoriaCreate').validate({
        rules: {
            nombre: "required",
            estado: "required"
        },
        messages: {
            nombre: {
                required: "Este campo es obligatorio"
            },
            estado: {
                required: "Este campo es obligatorio"
            }
        }
    });

    $('#formCategoriaUpdate').validate({
        rules: {
            nombre: "required",
            estado: "required"
        },
        messages: {
            nombre: {
                required: "Este campo es obligatorio"
            },
            estado: {
                required: "Este campo es obligatorio"
            }
        }
    });

    $('#formEditorialCreate').validate({
        rules: {
            nombre: "required",
            estado: "required"
        },
        messages: {
            nombre: {
                required: "Este campo es obligatorio"
            },
            estado: {
                required: "Este campo es obligatorio"
            }
        }
    });

    $('#formEditorialUpdate').validate({
        rules: {
            nombre: "required",
            estado: "required"
        },
        messages: {
            nombre: {
                required: "Este campo es obligatorio"
            },
            estado: {
                required: "Este campo es obligatorio"
            }
        }
    });

    $('#formUbicacionCreate').validate({
        rules: {
            nombre: "required",
            estado: "required"
        },
        messages: {
            nombre: {
                required: "Este campo es obligatorio"
            },
            estado: {
                required: "Este campo es obligatorio"
            }
        }
    });

    $('#formUbicacionUpdate').validate({
        rules: {
            nombre: "required",
            estado: "required"
        },
        messages: {
            nombre: {
                required: "Este campo es obligatorio"
            },
            estado: {
                required: "Este campo es obligatorio"
            }
        }
    });

    $('#formAutorUpdate').validate({
        rules: {
            nombre: "required",
            apellido: "required",
            pais: "required",
            estado: "required"
        },
        messages: {
            nombre: {
                required: "Este campo es obligatorio"
            },
            apellido: {
                required: "Este campo es obligatorio"
            },
            pais: {
                required: "Este campo es obligatorio"
            },
            estado: {
                required: "Este campo es obligatorio"
            }
        }
    });

    $('#formPrestamos').validate({
        rules: {
            usuario_id: "required",
            libro_id: "required"
        },
        messages: {
            usuario_id: {
                required: "Este campo es obligatorio"
            },
            libro_id: {
                required: "Este campo es obligatorio"
            }
        }
    });

    $('#formCategoriasCreate').validate({
        rules: {
            nombre: "required"
        },
        messages: {
            nombre: {
                required: "Este campo es obligatorio"
            }
        }
    });

    $('#formUbicacionesCreate').validate({
        rules: {
            nombre: "required"
        },
        messages: {
            nombre: {
                required: "Este campo es obligatorio"
            }
        }
    });

    $('#formEditorialesCreate').validate({
        rules: {
            nombre: "required"
        },
        messages: {
            nombre: {
                required: "Este campo es obligatorio"
            }
        }
    });
});