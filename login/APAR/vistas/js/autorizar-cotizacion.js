$(document).ready(function () {
    // Setup - add a text input to each footer cell
    $('#sell_table thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#sell_table thead');
 
    var table = $('#sell_table').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        initComplete: function () {
            var api = this.api();
 
            // For each column
            api
                .columns()
                .eq(0)
                .each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
 
                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('keyup change', function (e) {
                            e.stopPropagation();
 
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();
 
                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
 
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
        },
        "buttons": ["csv", "excel","colvis"]
    }).buttons().container().appendTo('#sell_table_wrapper .col-md-6:eq(0)');
});

/*=============================================
EDITAR Cotizacion
=============================================*/
$(".ajax_view").on("click", ".btnEditarCotizacion", function(){

	var idCotizacion = $(this).attr("idCotizacion");
	
    //console.log(idCotizacion);

	var datos = new FormData();
	datos.append("idCotizacion", idCotizacion);

	$.ajax({

		url:"ajax/autorizar-cotizacion.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
		  console.log(respuesta);
            $("#DT_FechaHora").val(respuesta["Fecha"]);
			$("#ETB_Folio").val(respuesta["Folio"]);
            $('#EnuevoAsociado').val(respuesta["Asociado"]); // Select the option with a value of '1'
			$('#EnuevoAsociado').trigger('change'); // Notify any JS components that the value changed
            $('#EnuevoCliente').val(respuesta["Cliente"]); // Select the option with a value of '1'
			$('#EnuevoCliente').trigger('change'); // Notify any JS components that the value changed
            $('#EnuevoMercancia').val(respuesta["Mercancia"]); // Select the option with a value of '1'
			$('#EnuevoMercancia').trigger('change'); // Notify any JS components that the value changed
            $("#ETB_Giro").val(respuesta["Griro"]);
            $("#ETB_DescripcionMercancia").val(respuesta["DescripcionMercancia"]);
            $('#EnuevoTipoEmpaque').val(respuesta["TipoEmpaque"]); // Select the option with a value of '1'
			$('#EnuevoTipoEmpaque').trigger('change'); // Notify any JS components that the value changed
            $('#EnuevoTLER').val(respuesta["TipoTraslado"]); // Select the option with a value of '1'
			$('#EnuevoTLER').trigger('change'); // Notify any JS components that the value changed
            $("#ETB_ValorEmbarque").val(respuesta["Valor_Embarque"]);
            $('#EMTPT').val(respuesta["Medio_Transporte"]); // Select the option with a value of '1'
			$('#EMTPT').trigger('change'); // Notify any JS components that the value changed
            $('#EnuevoBienesDesperdicios').val(respuesta["Tipodebien"]); // Select the option with a value of '1'
			$('#EnuevoBienesDesperdicios').trigger('change'); // Notify any JS components that the value changed
            $('#EnuevoCVJ').val(respuesta["Continuacion_Viaje"]); // Select the option with a value of '1'
			$('#EnuevoCVJ').trigger('change'); // Notify any JS components that the value changed
            $('#EnuevoTipoEmbarque').val(respuesta["Embarque"]); // Select the option with a value of '1'
			$('#EnuevoTipoEmbarque').trigger('change'); // Notify any JS components that the value changed
            $('#EnuevoRemolque').val(respuesta["Doble_remolque"]); // Select the option with a value of '1'
			$('#EnuevoRemolque').trigger('change'); // Notify any JS components that the value changed
            $('#EnuevoContenedor').val(respuesta["Ampara_contenedor"]); // Select the option with a value of '1'
			$('#EnuevoContenedor').trigger('change'); // Notify any JS components that the value changed
            $("#Econtenedor1").val(respuesta["Identificador_Contenedor1"]);
            $("#Evalormercancia1").val(respuesta["valormercanciauno"]);
            $("#Econtenedor2").val(respuesta["Identificador_Contenedor2"]);
            $("#Evalormercancia2").val(respuesta["valormercanciados"]);

            $('#EnuevoTipoContenedor1').val(respuesta["Tipocontenedorprimero"]); // Select the option with a value of '1'
			$('#EnuevoTipoContenedor1').trigger('change'); // Notify any JS components that the value changed
            $("#ETB_Valor1").val(respuesta["valormercanciamaximouno"]);
            $("#ETB_SumaSolicitada1").val(respuesta["Sumasolicitadaprimero"]);

            $('#EnuevoTipoContenedor2').val(respuesta["Tipocontenedorsegundo"]); // Select the option with a value of '1'
			$('#EnuevoTipoContenedor2').trigger('change'); // Notify any JS components that the value changed
            $("#ETB_SumaSolicitada2").val(respuesta["Sumasolicitadaprimero"]);
            $("#ETB_Valor2").val(respuesta["valormercanciamaximodos"]);
            $("#ETB_NumeroGuia").val(respuesta["Numero_guia"]);
            $("#etime").val(respuesta["Hora_InicioCobertura"]);
            $("#edt").val(respuesta["Fecha_InicioCobertura"]);

            $('#ETB_PaisOrigen').val(respuesta["PaisOrigenEmbarque"]); // Select the option with a value of '1'
			$('#ETB_PaisOrigen').trigger('change'); // Notify any JS components that the value changed
            $('#ETB_OrigenCobertura').val(respuesta["OrigenCobertura"]); // Select the option with a value of '1'
			$('#ETB_OrigenCobertura').trigger('change'); // Notify any JS components that the value changed
            $('#ETB_OrigenCobertura').val(respuesta["OrigenCobertura"]); // Select the option with a value of '1'
			$('#ETB_OrigenCobertura').trigger('change'); // Notify any JS components that the value changed
            $("#ETB_EstadoOrigenCobertura").val(respuesta["EstadoOrigenCobertura"]);
            $("#ETB_MunicipioOrigenCobertura").val(respuesta["MunicipioOrigenCobertura"]);
            $('#ETB_PaisDestinoCobertura').val(respuesta["PaisDestinoEmbarque"]); // Select the option with a value of '1'
			$('#ETB_PaisDestinoCobertura').trigger('change'); // Notify any JS components that the value changed
            $("#ETB_EstadoDestinoCobertura").val(respuesta["EstadoDestinoEmbarque"]);
            $("#ETB_MunicipioDestinoCobertura").val(respuesta["MunicipioDestinoEmbarque"]);
            $('#EEMAYOR').val(respuesta["TransporteAntiguedad"]); // Select the option with a value of '1'
			$('#EEMAYOR').trigger('change'); // Notify any JS components that the value changed
            $('#ECmbx_VAPSG').val(respuesta["Valor_Serguro"]); // Select the option with a value of '1'
			$('#ECmbx_VAPSG').trigger('change'); // Notify any JS components that the value changed
            $("#ETB_DescripcionGPS").val(respuesta["Descripcion_seguridad"]);
            $("#ETB_NLITPTA").val(respuesta["LineaTransportista"]);
            $('#EnuevoNbLNTRP').val(respuesta["TipoLineaTransportista"]); // Select the option with a value of '1'
			$('#EnuevoNbLNTRP').trigger('change'); // Notify any JS components that the value changed
            $("#ETB_NombreChofer").val(respuesta["NombreChofer"]);
            $('#EnuevoTipoVehiculo').val(respuesta["TipoVehiculo"]); // Select the option with a value of '1'
			$('#EnuevoTipoVehiculo').trigger('change'); // Notify any JS components that the value changed
            $("#ETB_Marca").val(respuesta["Marca"]);
            $("#ETB_Modelo").val(respuesta["Modelo"]);
            $("#ETB_Placas").val(respuesta["NumeroPlacas"]);
            $("#ETB_Color").val(respuesta["Color"]);
            $("#ETB_Motor").val(respuesta["NumeroMotor"]);
            $("#ETB_Serie").val(respuesta["NumeroSerie"]);
            $('#EnuevoCBM').val(respuesta["Riesgos_cubiertos"]); // Select the option with a value of '1'
			$('#EnuevoCBM').trigger('change'); // Notify any JS components that the value changed
            $("#ETB_CMCIA").val(respuesta["CuotaMercanciaApar"]);
            $("#ETB_PNTA").val(respuesta["PrimaNetaMercanciaApar"]);
            $("#ETB_PMCTND").val(respuesta["PrimaNetaContenedorApar"]);
            $("#ETB_PMAGT").val(respuesta["PrimaNetaTotalApar"]);
            $("#ETB_DCRT").val(respuesta["DerechoCertificadoApar"]);
            $("#ETB_IVA").val(respuesta["IvaApar"]);
            $("#ETB_IVATOTAL").val(respuesta["PrimaTotalApar"]);
            $("#EPNETA").val(respuesta["CuotaMercanciaUsuario"]);
            $("#ETB_PNTAT").val(respuesta["PrimaNetaMercanciaUsuario"]);
            $("#ETB_PMCTNDT").val(respuesta["PrimaNetaContenedorUsuario"]);
            $("#ETB_PMAGTT").val(respuesta["PrimaNetaTotalUsuario"]);
            $("#ETB_DCRTT").val(respuesta["DerechoCertificadoUsuario"]);
            $("#EIVA").val(respuesta["IvaUsuario"]);
            $("#ETOTAL").val(respuesta["PrimaTotalUsuario"]);
            $("#ETB_DescripcionCondicionesTER").val(respuesta["DescripcionCondicionesTER"]);
            $("#ETB_ObservacionGnral").val(respuesta["ObservacionGnral"]);
            $("#ETB_Deducible").val(respuesta["Deducibles"]);
            $("#ETB_CuotaContenedor").val(respuesta["CuotaContenedor"]);
            $("#TB_CoberturaMercancia").val(respuesta["CoberturaMercancia"]);
            $("#TB_CoberturaContenedor").val(respuesta["CoberturaContenedor"]);
			$("#Idcotizacion").val(respuesta["Id"]);

           
            ObtenerDatosAsociado($("#EnuevoAsociado").val());
            ObtenerDatosCliennte($("#EnuevoCliente").val());
            ObtenerMercanciaAutorizar($("#EnuevoMercancia").val());

		}

	});

})

function ObtenerMercanciaAutorizar(idmercancia){
	var idMercancia = idmercancia;
	
	var datos = new FormData();
	datos.append("idMercancia", idMercancia);

	$.ajax({

		url:"ajax/giro.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){



            $("#TB_DeducibleROT").val(respuesta["DEDUCIBLE_ROT"]);
            $("#TB_DEDUCIBLE_ROBO").val(respuesta["DEDUCIBLE_ROBO"]);
            $("#TB_DEDUCIBLE_OTROS_R").val(respuesta["DEDUCIBLE_OTROS_R"]);
            $("#TB_DEDUCIBLE_SVT").val(respuesta["DEDUCIBLE_SVT"]);
            $("#TB_EMBARQUE_CARRETERA_LIBRE").val(respuesta["EMBARQUE_CARRETERA_LIBRE"]);
            $("#TB_MARITIMO_AEREO_COMBINADO").val(respuesta["MARITIMO_AEREO_COMBINADO"]);
			
		}

	});
  }

//Funcion que sirve para obtener el giro de la mercancia seleccionada
function ObtenerDatosAsociado(idAsociado){
	var idAsociado = idAsociado;
	
	var datos = new FormData();
	datos.append("idUsuario", idAsociado);

	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

            //console.log("respuesta correcta de ogtener datos");
			$("#TB_PrefijoFolio").val(respuesta["Abreviatura"]);
            $("#TB_ObjComision").val(respuesta["Comision"]);
            $("#TB_ObjCuotaBasica").val(respuesta["Cuota_VT"]);
            $("#TB_ObjCuotaRot").val(respuesta["Cuota_Rot"]);
            $("#TB_ObjCuotaTR").val(respuesta["Cuota_TR"]);
            $("#TB_ObjCuotaContenedor").val(respuesta["Cuota_Contenedor"]);
            $("#TB_ObjPrimaminima").val(respuesta["Prima_minima"]);
            $("#TB_ObjDerechoCertificado").val(respuesta["Derecho_Certificado"]);
            $("#TB_EmailAsociado").val(respuesta["Email"]);
            $("#TB_ImagenAsociado").val(respuesta["Foto"]);

			
		}

	});
  }

 $('#Adatos_certificado').submit(function(e){ 
    
    e.preventDefault(); 


$("#btnautorizar").on('click',function(){
    Swal.fire({
        title: "Estar Seguro de Autorizar la Cotizacion",
        type: 'info',
        showCancelButton: true,
        confirmButtonClass: "btn-primary",
        confirmButtonText: "Aceptar",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }).then((result) =>{
        if(result.value){
            
            var _Folio = $("#ETB_Folio").val();
            var _Fecha = $("#DT_FechaHora").val();
            var folio;

            var _Idcotizacion = $("#Idcotizacion").val(); 

            var _Asosiado;
            if($("#EnuevoIdAsociado").val() != null && $("#EnuevoIdAsociado").val() != '' ){
                _Asosiado = $("#EnuevoIdAsociado").val(); //$( "# option:selected" ).text();
            }else{
                _Asosiado = $("#EnuevoAsociado").val(); //$( "# option:selected" ).text();
            }
            var _cliente = $("#EnuevoCliente").val();
            var _Mercancia = $("#EnuevoMercancia").val();
            var _Griro = $("#ETB_Giro").val();//giro falta campo en la bd y grabar
            var _DescripcionMercancia = $("#ETB_DescripcionMercancia").val();
            var _TipoEmpaque = $("#EnuevoTipoEmpaque").val();
            var _TipoTraslado = $("#EnuevoTLER").val(); // TipoTraslado falta en la bd 
            var _Valor_Embarque = $("#ETB_ValorEmbarque").val();
            var _Medio_Transporte =  $("#EMTPT").val();
            var _Tipodebien = $("#EnuevoBienesDesperdicios").val();
            var _Continuacion_Viaje = $("#EnuevoCVJ").val();
            var _Embarque =  $("#EnuevoTipoEmbarque").val();	
            var _Doble_remolque = $("#EnuevoRemolque").val();
            var _Ampara_contenedor = $("#EnuevoContenedor").val();
            var _idcontenedor1 = $("#Econtenedor1").val();
            var _valormercancia1 = $("#Evalormercancia1").val();//ValorMercancia1 falta en bd
            var _idcontenedor2 = $("#Econtenedor2").val();
            var _valormercancia2 = $("#Evalormercancia2").val();//ValorMercancia2 falta en bd
            var _Tipocontenedorprimero = $("#EnuevoTipoContenedor1").val();
            var _valormercanciamaximo1 = $("#ETB_Valor1").val();//valormercanciamaximo1 falta en bd
            var _Sumasolicitadaprimero = $("#ETB_SumaSolicitada1").val();
            var _Tipocontenedorsegundo = $("#EnuevoTipoContenedor2").val();
            var _valormercanciamaximo2 = $("#ETB_Valor2").val();//valormercanciamaximo2 falta en bd
            var _Sumasolicitadasegundo = $("#ETB_SumaSolicitada2").val();
            var _NumeroGuia = $("#ETB_NumeroGuia").val();
            var _fechacobertura= $("#edt").val();
            var _horacobertura=$("#etime").val();
            var _PaisOrigenEmbarque = $("#ETB_PaisOrigen").val();
            var _OrigenCobertura = $("#ETB_OrigenCobertura").val();
            var _EstadoOrigenCobertura = $("#ETB_EstadoOrigenCobertura").val();
            var _MunicipioOrigenCobertura = $("#ETB_MunicipioOrigenCobertura").val();
            var _PaisDestinoEmbarque = $("#ETB_PaisDestinoCobertura").val();
            var _EstadoDestinoEmbarque = $("#ETB_EstadoDestinoCobertura").val();
            var _MunicipioDestinoEmbarque = $("#ETB_MunicipioDestinoCobertura").val();
            var _TransporteAntiguedad = $("#EEMAYOR").val(); //TransporteAntiguedad falta en bd
            var _TipoSeguro = $( "#ECmbx_VAPSG" ).val(); //$("#Cmbx_VAPSG").val();
            var _Descripcion_seguridad = $("#ETB_DescripcionGPS").val();
            var _LineaTransportista = $("#ETB_NLITPTA").val(); //$("#TB_NLITPTA").val();
            var _TipoLineaTransportista = $("#EnuevoNbLNTRP").val();
            var _NombreChofer = $("#ETB_NombreChofer").val();
            var _TipoVehiculo = $("#EnuevoTipoVehiculo").val();// $("#nuevoTipoVehiculo").val();
            var _Marca = $("#ETB_Marca").val();
            var _Modelo  = $("#ETB_Modelo").val();
            var _NumeroPlacas  = $("#ETB_Placas").val();
            var _NumeroMotor = $("#ETB_Motor").val();
            var _NumeroSerie = $("#ETB_Serie").val();
            var _Color = $("#ETB_Color").val();
            var _Riesgos_cubiertos = $("#EnuevoCBM").val();
            var _CuotaMercanciaApar = $("#ETB_CMCIA").val();
            var _PrimaNetaMercanciaApar = $("#ETB_PNTA").val();
            var _PrimaNetaContenedorApar = $("#ETB_PMCTND").val();
            var _PrimaNetaTotalApar = $("#ETB_PMAGT").val();
            var _DerechoCertificadoApar = $("#ETB_DCRT").val();
            var _IvaApar = $("#ETB_IVA").val();
            var _PrimaTotalApar = $("#ETB_IVATOTAL").val();
            var _CuotaMercanciaUsuario = $("#EPNETA").val();
            var _PrimaNetaMercanciaUsuario = $("#ETB_PNTAT").val();
            var _PrimaNetaContenedorUsuario = $("#ETB_PMCTNDT").val();
            var _PrimaNetaTotalUsuario = $("#ETB_PMAGTT").val();
            var _DerechoCertificadoUsuario = $("#ETB_DCRTT").val();
            var _IvaUsuario = $("#EIVA").val();
            var _PrimaTotalUsuario = $("#ETOTAL").val();
            var _DescripcionCondicionesTER = $("#ETB_DescripcionCondicionesTER").val(); //Agregar a la bd
            var _ObservacionGnral = $("#ETB_ObservacionGnral").val(); //Agregar a la bd
            var _Deducibles = $("#ETB_Deducible").val();
            var _CuotaContenedor = $("#ETB_CuotaContenedor").val(); // Agregar a la bd
            var _CoberturaMercancia = $("#TB_CoberturaMercancia").val(); // Agregar a la bd
            var _CoberturaContenedor = $("#TB_CoberturaContenedor").val(); // Agregar a la bd
            var _Moneda = "Pesos Mexicanos";
            var _Numero_remolque;
            
            if($("#EnuevoTipoContenedor1").val() != "" && $("#EnuevoTipoContenedor2").val() != ""){
                _Numero_remolque = 2;
            }else if($("#EnuevoTipoContenedor1").val() != "" && $("#EnuevoTipoContenedor2").val() == ""){
                _Numero_remolque = 1;
            }
            else if($("#EnuevoTipoContenedor1").val() == "" && $("#EnuevoTipoContenedor2").val() != ""){
                _Numero_remolque = 1;
            }

                
                //<!-- Variables de los controles para mandar en la funcion de insertar -->
            let ajax = {
                method: "new_certificado",
                Idcotizacion: _Idcotizacion,
                Asosiado: _Asosiado,
                Fecha: _Fecha,
                Folio: _Folio,
                Cliente: _cliente,
                Numero_guia: _NumeroGuia,
                Identificador_Contenedor1: _idcontenedor1,
                Identificador_Contenedor2: _idcontenedor2,
                Fecha_InicioCobertura: _fechacobertura,
                Hora_InicioCobertura: _horacobertura,
                PaisOrigenEmbarque: _PaisOrigenEmbarque, 
                OrigenCobertura : _OrigenCobertura,
                EstadoOrigenCobertura: _EstadoOrigenCobertura, 
                MunicipioOrigenCobertura : _MunicipioOrigenCobertura,
                PaisDestinoEmbarque: _PaisDestinoEmbarque,
                EstadoDestinoEmbarque: _EstadoDestinoEmbarque,
                MunicipioDestinoEmbarque:_MunicipioDestinoEmbarque,
                Medio_Transporte : _Medio_Transporte,
                Embarque : _Embarque,
                TipoLineaTransportista : _TipoLineaTransportista,
                TipoVehiculo : _TipoVehiculo,
                LineaTransportista : _LineaTransportista,
                TipoSeguro : _TipoSeguro,
                Marca : _Marca , 
                Modelo : _Modelo, 
                NumeroPlacas : _NumeroPlacas, 
                NumeroMotor : _NumeroMotor, 
                NumeroSerie : _NumeroSerie, 
                Color : _Color, 
                NombreChofer : _NombreChofer,
                Continuacion_Viaje : _Continuacion_Viaje,
                Riesgos_cubiertos : _Riesgos_cubiertos,
                Deducibles : _Deducibles,
                DescripcionMercancia : _DescripcionMercancia,
                Mercancia : _Mercancia,
                TipoEmpaque : _TipoEmpaque,
                Valor_Embarque : _Valor_Embarque,
                Moneda : _Moneda,
                Numero_remolque : _Numero_remolque,
                Descripcion_seguridad : _Descripcion_seguridad,
                Doble_remolque: _Doble_remolque,
                Ampara_contenedor : _Ampara_contenedor,
                Tipocontenedorprimero: _Tipocontenedorprimero, 
                Tipocontenedorsegundo: _Tipocontenedorsegundo,
                Sumasolicitadaprimero: _Sumasolicitadaprimero,
                Sumasolicitadasegundo :_Sumasolicitadasegundo, 
                Tipodebien: _Tipodebien,
                CuotaMercanciaApar : _CuotaMercanciaApar,
                PrimaNetaMercanciaApar : _PrimaNetaMercanciaApar,
                PrimaNetaContenedorApar : _PrimaNetaContenedorApar,
                PrimaNetaTotalApar : _PrimaNetaTotalApar,
                DerechoCertificadoApar : _DerechoCertificadoApar,
                IvaApar : _IvaApar,
                PrimaTotalApar : _PrimaTotalApar,
                CuotaMercanciaUsuario : _CuotaMercanciaUsuario,
                PrimaNetaMercanciaUsuario : _PrimaNetaMercanciaUsuario,
                PrimaNetaContenedorUsuario : _PrimaNetaContenedorUsuario,
                PrimaNetaTotalUsuario : _PrimaNetaTotalUsuario,
                DerechoCertificadoUsuario : _DerechoCertificadoUsuario,
                IvaUsuario : _IvaUsuario,
                PrimaTotalUsuario : _PrimaTotalUsuario,
                Griro :_Griro,
                TipoTraslado : _TipoTraslado,
                valormercancia1 : _valormercancia1,
                valormercancia2 : _valormercancia2,
                valormercanciamaximo1 : _valormercanciamaximo1,
                valormercanciamaximo2 : _valormercanciamaximo2,
                TransporteAntiguedad : _TransporteAntiguedad,
                DescripcionCondicionesTER : _DescripcionCondicionesTER,
                ObservacionGnral : _ObservacionGnral,
                CuotaContenedor : _CuotaContenedor,
                CoberturaMercancia : _CoberturaMercancia,
                CoberturaContenedor : _CoberturaContenedor
                
            }
           // console.log(ajax);
            $.ajax({
                url: 'global/sp_registro.php',
                type: "POST",
                data: ajax,
                success: function(data, textStatus, jqXHR)
                {
                    $resp = JSON.parse(data);
                    if($resp['status'] == true){
                        var id = $resp['lastInsertId'];
                        folio = $resp['folio'];
                        var foliocotizacion = $resp['foliocotizacion'];
                        Swal.fire({
                            title: "Certificado Generada Correctamente",
                            html: ' <p>Folio Certificado: <strong>' + folio + '</strong>.</p> ',
                            type: "info",
                            width: 600,
                            padding: '3em',
                            background: '#fff',
                            backdrop: `
                            rgba(0,0,123,0.4)
                            left top
                            no-repeat`,
                            showCancelButton: false,
                            confirmButtonClass: "btn-primary",
                            confirmButtonText: "Aceptar",
                            closeOnConfirm: false,
                            showLoaderOnConfirm: true
                        
                                    }).then((result) => {
                                        if(result.value){
                                           // impresionReciboCobro();
                                            impresionCertificadoPDF(folio,id,foliocotizacion);
												//impresionReciboCobro();
                                        location.reload();
                                        }
                                    })
                            
                    }else{
                            Swal.fire("Error save customer : "+$resp['message'])
                    }
                },
                error: function (request, textStatus, errorThrown) {
                    Swal.fire("Error ", request.responseJSON, "error");
                }
            });
        }
    })
});
    
$("#btncancelar").on('click',function(){
    Swal.fire({
        title: "Esta Seguro de Rechazar la Cotizacion",
        type: 'info',
        showCancelButton: true,
        confirmButtonClass: "btn-primary",
        confirmButtonText: "Aceptar",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }).then((result) =>{
        if(result.value){
					
            var _IdCotizacion = $("#Idcotizacion").val();
            
                //<!-- Variables de los controles para mandar en la funcion de insertar -->
            let ajax = {
                method: "rechazar_cotizacion",
                IdCotizacion: _IdCotizacion
                 
            }
            $.ajax({
                url: 'global/sp_registro.php',
                type: "POST",
                data: ajax,
                success: function(data, textStatus, jqXHR)
                {
                    $resp = JSON.parse(data);
                    if($resp['status'] == true){
                        var id = $resp['lastInsertId'] ;
                        folio = $resp['folio'] ;
                        Swal.fire({
                            title: "Actualizacion de Cotizacion",
                            html: 'Operacion Realizada Correctamente ',
                            type: "info",
                            width: 600,
                            padding: '3em',
                            background: '#fff',
                            backdrop: `
                            rgba(0,0,123,0.4)
                            left top
                            no-repeat`,
                            showCancelButton: false,
                            confirmButtonClass: "btn-primary",
                            confirmButtonText: "Aceptar",
                            closeOnConfirm: false,
                            showLoaderOnConfirm: true
                        
                                    }).then((result) => {
                                        if(result.value){
                                        location.reload();
                                        }
                                    })
                            
                    }else{
                            Swal.fire("Error save customer : "+$resp['message'])
                    }
                },
                error: function (request, textStatus, errorThrown) {
                    Swal.fire("Error ", request.responseJSON, "error");
                }
            });
        }

    })
});

});

function ObtenerDatosCliennte(_idCliente){
	//alert($(this).val());
	
	var idCliente = _idCliente;
	
    //console.log(idCliente);

	var datos = new FormData();
	datos.append("idClienteCompleto", idCliente);

	$.ajax({

		url:"ajax/clientes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
		//	console.log(respuesta["Id"]);
			
		var numero = "";
		var Direccion = "";
		if(respuesta["Numero_Interior"] != "" && respuesta["Numero_Exterior"] != ""){

			numero = "N°"+ respuesta["Numero_Exterior"] + ", " + respuesta["Numero_Interior"];

		}else if (respuesta["Numero_Interior"] != "" && respuesta["Numero_Exterior"] == ""){

			numero = "N°"+ respuesta["Numero_Interior"];

		}else if (respuesta["Numero_Interior"] == "" && respuesta["Numero_Exterior"] != ''){

			numero = "N°"+ respuesta["Numero_Exterior"];

		}
			Direccion = respuesta["Calle"] + " " + numero + ", COL. " + respuesta["Colonia"] + ", " + respuesta["MunicipioDescripcion"]  + "," + respuesta["EstadoDescripcion"] + ", " + respuesta["Pais"] + " C.P " + respuesta["CodigoPostal"]; 


			//$("#Cuota_CL_ROT").val(respuesta["Cuota_ROT"]);
			//$("#Cuota_CL_TR").val(respuesta["Cuota_TR"]);
			//$("#Cuota_CL_VT").val(respuesta["Cuota_TRVT"]);

			$("#Erfc").val(respuesta["RFC"]);
			$("#Eemail").val(respuesta["Email"]);
			$("#Edireccion").val(Direccion);
		}

	});
}

function VentanaCentrada(theURL,winName,features, myWidth, myHeight, isCenter) { //v3.0
    if(window.screen)if(isCenter)if(isCenter=="true"){
      var myLeft = (screen.width-myWidth)/2;
      var myTop = (screen.height-myHeight)/2;
      features+=(features!='')?',':'';
      features+=',left='+myLeft+',top='+myTop;
    }
    window.open(theURL,winName,features+((features!='')?',':'')+'width='+myWidth+',height='+myHeight);
  }

function impresionCertificadoPDF(folio, id, foliocotizacion){

    //alert($("#TB_OrigenCobertura option:selected" ).text());

    var asosiado = $( "#EnuevoAsociado option:selected" ).text();
    var cliente = $( "#EnuevoCliente option:selected" ).text();
    var mercancia = $( "#ETB_DescripcionMercancia" ).val();
    var valormercancia1 = $("#Evalormercancia1").val(); 
    var valormercancia2 = $("#Evalormercancia2").val(); 
    var mediotransporte = $( "#EMTPT option:selected" ).text();
    var dobleremolque = $( "#EnuevoRemolque option:selected" ).text();
    var amparacontenedor = $( "#EnuevoContenedor option:selected" ).text();
    var tipocontenedor1 = $( "#EnuevoTipoContenedor1 option:selected" ).text();
    var tipocontenedor2 = $( "#EnuevoTipoContenedor2 option:selected" ).text();
    var tipodebien = $( "#EnuevoBienesDesperdicios option:selected" ).text();
    var TipoSeguro = $( "#ECmbx_VAPSG option:selected" ).text();
    var Sumasolicitadaprimero = $("#ETB_SumaSolicitada1").val();
    var Sumasolicitadasegundo = $("#ETB_SumaSolicitada2").val();
    var TipoEmpaque = $("#EnuevoTipoEmpaque").val();
    var cv = $( "#EnuevoCVJ option:selected" ).text();
    var cobertura = $( "#EnuevoCBM option:selected" ).text()
    var primaneta = $("#EPNETA").val();
    var iva = $("#EIVA").val();
    var total = $("#ETOTAL").val();
    var Valorembarque = $("#ETB_ValorEmbarque").val();
    var rfc = $("#Erfc").val();
    var direccion = $("#Edireccion").val();
    var email = $("#Eemail").val();
    var idcontenedor1 = $("#Econtenedor1").val();
    var idcontenedor2 = $("#Econtenedor2").val();//idcontenedor1 ,idcontenedor1
    var fechacobertura= $("#edt").val();
    var horacobertura=$("#etime").val();
    var FechaHora=$("#DT_FechaHora").val();
    var paiscobertura= $( "#ETB_PaisOrigen option:selected" ).text();//$("#TB_PaisOrigen").val();
    var nuevoTipoEmbarque=$("#EnuevoTipoEmbarque").val();
    var nuevoLNTRP = $("#ETB_NLITPTA").val();
    var nuevoNbLNTRP = $("#EnuevoNbLNTRP").val();
    var nuevoTipoVehiculo = $("#EnuevoTipoVehiculo").val(); //TB_OrigenCobertura
    var OrigenCobertura = $("#ETB_MunicipioOrigenCobertura").val() + ", " + $("#ETB_EstadoOrigenCobertura").val() + ", " +  $( "#ETB_PaisOrigen option:selected" ).text();
    var DestinoCobertura = $("#ETB_MunicipioDestinoCobertura").val() + ", " + $("#ETB_EstadoDestinoCobertura").val() + ", " + $( "#ETB_PaisDestinoCobertura option:selected" ).text();//$("#TB_PaisDestinoCobertura").val();
    var ProtocoloDescripcion = $("#ETB_DescripcionProtocolo").val();
    var ObservacionGnral = $("#ETB_ObservacionGnral").val();
    var NumeroGuia = $("#ETB_NumeroGuia").val();
    var EmailAsociado = $("#ETB_EmailAsociado").val();
    var deducibles = $("#ETB_Deducible").val();
    var deduciblescontenedor = $("#ETB_CuotaContenedor").val();
    var coberturamercancia = $("#TB_CoberturaMercancia").val();
    var coberturacontenedor = $("#TB_CoberturaContenedor").val();
    var ImagenAsociado = $("#TB_ImagenAsociado").val().substring(7);
    var Descripcion_seguridad = $("#ETB_DescripcionGPS").val(); 
    var MayorAnios = $( "#EEMAYOR option:selected" ).text();
    var TB_DeducibleROT = $("#TB_DeducibleROT").val(); 
    var TB_DEDUCIBLE_ROBO = $("#TB_DEDUCIBLE_ROBO").val(); 
    var TB_DEDUCIBLE_OTROS_R = $("#TB_DEDUCIBLE_OTROS_R").val(); 
    var TB_DEDUCIBLE_SVT = $("#TB_DEDUCIBLE_SVT").val(); 
    var TB_MARITIMO_AEREO_COMBINADO = $("#TB_MARITIMO_AEREO_COMBINADO").val(); 
    
     /*  var marca = $("#ETB_Marca").val();
    var motor = $("#ETB_Motor").val();
    var nombrechofer = $("#ETB_NombreChofer").val(); */
        /* var numeroplacas = $("#ETB_Placas").val();
    var modelo = $("#ETB_Modelo").val();
    var serie = $("#ETB_Serie").val();
    var color = $("#ETB_Color").val(); */

    var _Id = id;
    var _Folio = folio;
    var foliocotizacion = foliocotizacion;
    
    //Funcion que manda a llamar la ventana para generar el pdf
      VentanaCentrada('vistas/pdf/documentos/certificado_pdf.php?asociado='+asosiado+'&MayorAnios='+MayorAnios+'&TB_DEDUCIBLE_ROBO='+TB_DEDUCIBLE_ROBO+'&TB_DEDUCIBLE_OTROS_R='+TB_DEDUCIBLE_OTROS_R+'&TB_DEDUCIBLE_SVT='+TB_DEDUCIBLE_SVT+'&TB_MARITIMO_AEREO_COMBINADO='+TB_MARITIMO_AEREO_COMBINADO+'&TB_DeducibleROT='+TB_DeducibleROT+'&cliente='+cliente+'&mercancia='+mercancia+'&mediotransporte='+mediotransporte+'&dobleremolque='+dobleremolque+'&amparacontenedor='+amparacontenedor+'&tipocontenedor1='+tipocontenedor1+'&tipocontenedor2='+tipocontenedor2+'&tipodebien='+tipodebien+'&cv='+cv+'&cobertura='+cobertura+'&primaneta='+primaneta+'&iva='+iva+'&total='+total+'&valorembarque='+Valorembarque+'&rfc='+rfc+'&email='+email+'&direccion='+direccion+'&idcontenedor1='+idcontenedor1+'&idcontenedor2='+idcontenedor2+'&fechacobertura='+fechacobertura+'&horacobertura='+horacobertura+'&OrigenCobertura='+OrigenCobertura+'&paiscobertura='+paiscobertura+'&DestinoCobertura='+DestinoCobertura+'&nuevoTipoEmbarque='+nuevoTipoEmbarque+'&nuevoLNTRP='+nuevoLNTRP+'&nuevoTipoVehiculo='+nuevoTipoVehiculo+'&nuevoNbLNTRP='+nuevoNbLNTRP+'&ProtocoloDescripcion='+ProtocoloDescripcion+'&ObservacionGnral='+ObservacionGnral+'&NumeroGuia='+NumeroGuia+'&_Id='+_Id+'&_Folio='+_Folio+'&EmailAsociado='+EmailAsociado+'&ImagenAsociado='+ImagenAsociado+'&FechaHora='+FechaHora+'&valormercancia2='+valormercancia2+'&valormercancia1='+valormercancia1+'&TipoEmpaque='+TipoEmpaque+'&Sumasolicitadaprimero='+Sumasolicitadaprimero+'&Sumasolicitadasegundo='+Sumasolicitadasegundo+'&deduciblescontenedor='+deduciblescontenedor+'&deducibles='+deducibles+'&coberturamercancia='+coberturamercancia+'&coberturacontenedor='+coberturacontenedor+'&TipoSeguro='+TipoSeguro+'&foliocotizacion='+foliocotizacion+'&Descripcion_seguridad='+Descripcion_seguridad, 'certificado','','1024','768','true');
}

//Funcion para mandar a imprimir el recibo de cobro
function impresionReciboCobro(){


    //console.log($( "#nuevoAsociado option:selected" ).text());
    var cliente = $( "#EnuevoCliente option:selected" ).text();
    var mercancia = $( "#EnuevoMercancia option:selected" ).text();
    var primaneta = $("#EPNETA").val();
    var iva = $("#EIVA").val();
    var total = $("#ETOTAL").val();
    var Valorembarque = $("#ETB_ValorEmbarque").val();
    var rfc = $("#Erfc").val();
    var direccion = $("#direccion").val();
    var fechacobertura= $("#Edt").val();
    var horacobertura=$("#Etime").val();
    
    //Se Manda a llamar la funcion de venta para mandar los parametro y generar el pdf
    VentanaCentrada('vistas/pdf/documentos/recibocobro_pdf.php?cliente='+cliente+'&mercancia='+mercancia+'&primaneta='+primaneta+'&iva='+iva+'&total='+total+'&valorembarque='+Valorembarque, 'recibocobro','','1024','768','true');
}

//Funcion que sirve en el control de Cuota del usuario que registra manualmente y se calcula
$("#EPNETA").blur(function() {

    //alert($("#EPNETA").val());
	var primantaapar = $("#ETB_IVATOTAL").val();
	var contenedor1,contenedor2,totalcontenedor, CuotaContenedorA, primanetaagente, iva, tasa;  

	var PNTA =  $(this).val();
	var ValorEmbarquetotal = $("#ETB_ValorEmbarque").val(); //Valor que ingresa el usuario
	//se poner el de iva que se usara para el calculo del iva
	var PrimaMinima = $("#TB_ObjPrimaminima").val();
	var DerechoCertificado = $("#TB_ObjDerechoCertificado").val();
	tasa = 16;
	//Se obtiene el valor de contenedor 1 y contendedor 2
	if(document.getElementById("ETB_SumaSolicitada1").value == ''){
		contenedor1 = 0
	}else{
		contenedor1 =  document.getElementById("ETB_SumaSolicitada1").value
	}
	if(document.getElementById("ETB_SumaSolicitada2").value == ''){
		contenedor2 = 0
	}else{
		contenedor2 =  document.getElementById("ETB_SumaSolicitada2").value
	}

	//alert(valor1);
	//alert(valor2);
	//valor2 = document.getElementById("TB_SumaSolicitada2").value;
	//Se obtiene  el porcenaje de la cuota de contenedor  
	CuotaContenedorA = $("#TB_ObjCuotaContenedor").val();
	//Se realizar la suma del valor contenedor 1 y 2
	totalcontenedor=parseFloat(contenedor1)+parseFloat(contenedor2);

	

	//Se calucula la prima neta agente = varlor embaque * porcentaje de cuota rot + el porcentaje de cuotacontendor * el resulñtaod de la suma d valor 1 y 2
	primanetaagente = ValorEmbarquetotal *  PNTA/100 + (CuotaContenedorA/100 * totalcontenedor);
	//Se obtiene el total de la suma de prima agente + derechi de certicado
	if(primanetaagente<PrimaMinima){
		//prima neta agente
	//	document.getElementById("TB_PMAGT").value = PrimaMinima;
		monto= parseFloat(PrimaMinima) + parseFloat(DerechoCertificado);
	}else{
		monto= parseFloat(primanetaagente) + parseFloat(DerechoCertificado);
	}
	//Se obtiene el iva del resultado de la suma anterior
	//iva = (monto * tasa)/100;

	//En caso de que si sea continuacion de viaje se obtiene el valor de CuotaRot y se pone 
	//en el campo de cuota mercancia  esto servira para calcular lo demas.
//	document.getElementById("TB_CMCIA").value = $("#TB_ObjCuotaBasica").val();
	//Si no es mayor la primaneta se calcula el valor de embarque por el valor de cuota rot / 100
	GranPNC = ValorEmbarquetotal *  PNTA/100;
	document.getElementById("ETB_PNTAT").value = GranPNC.toFixed(2);
	
	//prima neta contenedeor
	GranPNCNT = (CuotaContenedorA/100 * totalcontenedor);
	document.getElementById("ETB_PMCTNDT").value = GranPNCNT.toFixed(2);
	//prima neta agente
	if(primanetaagente<PrimaMinima){
		//prima neta agente
	 document.getElementById("ETB_PMAGTT").value = parseFloat(PrimaMinima).toFixed(2);
	}else{
		document.getElementById("ETB_PMAGTT").value = parseFloat(primanetaagente).toFixed(2) ;
	}
	//document.getElementById("TB_PMAGT").value = primanetaagente;
	//Se ingresa el valor de derecho de certificado
	document.getElementById("ETB_DCRTT").value  = parseFloat(DerechoCertificado).toFixed(2);
	//iva
	GranIVA = (monto * tasa)/100;
	document.getElementById("EIVA").value = GranIVA.toFixed(2);
	//prima total a pagar con iva
	GranTotal = parseFloat(monto)+ parseFloat((monto * tasa)/100);
	document.getElementById("ETOTAL").value = GranTotal.toFixed(2);
	
	 if(GranTotal < primantaapar){

		Swal.fire({
			title: 'La prima neta es menor a la prima APAR.',
			width: 600,
			padding: '3em',
			background: '#fff',
			backdrop: `
			  rgba(0,0,123,0.4)
			  left top
			  no-repeat
			`
		  }).then(()=>{
			document.getElementById("ETB_DCRTT").value = "";
			document.getElementById("ETB_PMAGTT").value = "";
			document.getElementById("ETB_PMCTNDT").value = "";
			document.getElementById("ETB_PNTAT").value = "";
			document.getElementById("EIVA").value = "";
			document.getElementById("ETOTAL").value = "";
			return;
		});	

	}else{
		//document.getElementById("IVA").value = iva;
		//document.getElementById("TOTAL").value = TotalPrimaNeta.toFixed(2);
	} 

	
	// tu codigo ajax va dentro de esta function...
  });
