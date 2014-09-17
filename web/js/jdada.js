$(document).ready(function() {
    $('#frm')
        .bootstrapValidator({
            excluded: [':disabled'],
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                nombre_proyecto: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese el Nombre del Proyecto'
                        }
                    }
                },
                idtipo_proyecto: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese el Tipo del Proyecto'
                        }
                    }
                },
                departamento: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese el Departamento'
                        }
                    }
                },
                provincia: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese la Provincia'
                        }
                    }
                },
                distrito: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese el Distrito'
                        }
                    }
                },
                periodo_ejecucion: {
                    validators: {
                        notEmpty: {
                            message: '<br>Ingrese el Periodo de Ejecucion del Proyecto'
                        }
                    }
                },
                CodigoFacultad: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese la Facultad'
                        }
                    }
                },
                CodigoEscuela: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese la Escuela'
                        }
                    }
                },
                idejetematico: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese el Periodo de Ejecucion del Proyecto'
                        }
                    }
                },
                idlinea_investigacion: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese el Periodo de Ejecucion del Proyecto'
                        }
                    }
                },
                antecedentes_problema: {
                    validators: {
                        notEmpty: {
                            message: 'Es de caracter obligatorio llenar los Antecedentes del problema'
                        }
                    }
                },
		definicion_problema: {
                    validators: {
                        notEmpty: {
                            message: 'Es de caracter obligatorio llenar la Definicion del problema'
                        }
                    }
                },
		formulacion_problema: {
                    validators: {
                        notEmpty: {
                            message: 'Es de caracter obligatorio llenar la Formulacion del problema'
                        }
                    }
                },  
                justificacion: {
                    validators: {
                        notEmpty: {
                            message: 'Es de caracter obligatorio llenar la Justificacion del Proyecto'
                        }
                    }
                },
		importancia: {
                    validators: {
                        notEmpty: {
                            message: 'Es de caracter obligatorio llenar la Importancia del Proyecto'
                        }
                    }
                },
		limitaciones: {
                    validators: {
                        notEmpty: {
                            message: 'Es de caracter obligatorio llenar las Limitaciones del Proyecto'
                        }
                    }
                },
		objetivo_general: {
                    validators: {
                        notEmpty: {
                            message: 'Es de caracter obligatorio llenar el Objetivo General'
                        }
                    }
                },
		objetivos_especificos: {
                    validators: {
                        notEmpty: {
                            message: 'Es de caracter obligatorio llenar los Objetivos Especificos'
                        }
                    }
                },
                antecedentes_investigacion: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese Antecedentes de Investigacion'
                        }
                    }
                },
                definicion_terminos: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese Definicion de Terminos'
                        }
                    }
                },
                bases_teoricas: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese Bases Teoricas'
                        }
                    }
                },
                hipotesis: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese Hipotesis'
                        }
                    }
                },
                sistema_variables: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese Sistema de Variables'
                        }
                    }
                },
                escala_medicion: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese Escala de Medicion'
                        }
                    }
                },
                tipo_investigacion: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese Tipo de Investigacion'
                        }
                    }
                },
                nivel_investigacion: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese Nivel de Investigacion'
                        }
                    }
                },
                disenio_investigacion: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese Diseño de Investigacion'
                        }
                    }
                },
                cobertura_investigacion: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese Cobertura de Investigacion'
                        }
                    }
                },
                fuente_investigacion: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese Fuente de Investigacion'
                        }
                    }
                },
                tecnicas_investigacion: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese Tecnicas de Investigacion'
                        }
                    }
                },
                instrumentos_invesitgacion: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese Instrumentos de Investigacion'
                        }
                    }
                },
                presentacion_datos: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese Presentacion de Datos'
                        }
                    }
                },
                analisis_datos: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese Analisis de Datos'
                        }
                    }
                },
                interpretacion_datos: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese Interpretacion de Datos'
                        }
                    }
                },
                presupuesto: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese Presupuesto'
                        }
                    }
                },
                financiamiento: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese Financiamiento'
                        }
                    }
                },
                asignacion_recursos: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese Asignacion Recursos'
                        }
                    }
                }
            }
        });
        $('#resetBtn').click(function() {
        $('#frm').data('bootstrapValidator').resetForm(true);
    });
});