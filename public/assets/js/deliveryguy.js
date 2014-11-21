var loadTable = function (id, tipo, urlajax, urltable, gridtable, columnas, accions, col_hidden,param) {

    botones_acciones = accions;
    $.ajax({
        type: tipo,
        url: $path_base + urlajax,
        data: param,
        beforeSend: function () {
            //deshabilitar();
            //gridtable.html(cargando);
        },
        success: function (datos) {
            tabla(id, urltable, datos, columnas, gridtable, accions, col_hidden);
        },
        error: function () {
            gridtable.html('hubo un error al recuperar los datos');
        }
    });
}

var tabla = function (id, url, datos, columnas, gridtable, actions, col_hidden) {
    var capa = $('<table class="table table-striped table-bordered table-hover" id="' + id + '"></table>');
    var cabecera = $('<thead></thead>');
    var cabecera_tr = $('<tr></tr>');
    var botones = '';
    cabecera.append(cabecera_tr);
    capa.append(cabecera);

    var h = 0;
    jQuery.each(columnas, function () {
        var classhidden = "";
        if (col_hidden[h] == false) {
            classhidden = 'class="hide"';
        }
        var header = $('<th ' + classhidden + '>' + this + '</th>');

        cabecera_tr.append(header);
        h++;
    });

    var cuerpo = $('<tbody></tbody>');
    capa.append(cuerpo);
    var i = 0;
    if (datos[0] != null) {
        jQuery.each(datos, function () {
            var cuerpo_tr = $('<tr></tr>');
            cuerpo.append(cuerpo_tr);
            var data = datos[i];
            var j = 0;
            for (var property in data) {
                var classhidden = "";
                if (col_hidden[j] == false) {
                    classhidden = 'hidden';
                } else {
                    classhidden = 'col';
                }
                var body = $('<td class="' + classhidden + '"><input type="hidden" id="' + property + '_' + data['id'] + '" value="' + data[property] + '"/>' + data[property] + '</td>');
                cuerpo_tr.append(body);
                j++;

                botones = addBotones(data['acciones'], url, data['id']);
            }
            i++;
            var td_accions = $('<td></td>');
            td_accions.append(botones);
            cuerpo_tr.append(td_accions);
            botones = '';
        });

        $(gridtable).html(capa);

        $('#' + id).dataTable({
            responsive: true,
            "order": [
                [ 0, "desc" ]
            ]

        });
        //tool_tip();
        //habilitar();
    } else {
        var cuerpo_tr = $('<tr></tr>');
        var tamanio = col_hidden.length;
        cuerpo.append(cuerpo_tr);
        var body = $('<td colspan="' + tamanio + '" class="text-center">No hay datos disponibles!</td>');
        cuerpo_tr.append(body);
        $(gridtable).html(capa);
        //habilitar();

    }
}

var addBotones = function (action, url, id) {
    var boton1 = '<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">';
    var boton2 = '<div class="visible-xs visible-sm hidden-md hidden-lg"><div class="inline position-relative"><button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-save bigger-110"></i></button><ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">';
    var botones_min = '';
            boton2 += '<li>';
            switch (this.idaccion) {
                case 2:
                    botones_min = '<a class="green tooltip-success" data-rel="tooltip" title="Editar" href="#modal-form" role="button" data-toggle="modal" onclick="editar(\'' + url + '\',\'' + id + '\')"><i class="icon-pencil bigger-130"></i></a>';
                    break;
                case 1:
                    botones_min = '<a class="red delete_' + id + 'tooltip-error" data-rel="tooltip" title="Eliminar" href="javascript:void(0)" onclick="eliminar(this,\'' + url + '\',\'' + id + '\')"><i class="fa fa-save bigger-130"></i></a>';
                    break;

                case "view":
                    botones_min = '<a class="green tooltip-success" data-rel="tooltip" title="Ver" href="#modal-view" role="button" data-toggle="modal" onclick="ver(\'' + url + '\',\'' + id + '\')"><i class="icon-eye-open bigger-130"></i></a>';
                    break;
                case "view_a":
                    botones_min = '<a class="blue tooltip-success" data-rel="tooltip"  href="#myModalAdd" role="button" data-toggle="modal" onclick="ver_a(\'' + 'getMiembros' + '\',\'' + id + '\')"><i class="icon-plus-sign bigger-130"></i></a>';
                    break;
                case 3:
                    botones_min = '<a class="green" title="Asignar" href="#" role="button" onclick="asignar(\'' + id + '\',this)"><i class="icon-check-empty bigger-150"></i></a>';
                    break;

                case 4:
                    botones_min = '<a class="purple tooltip-info" data-rel="tooltip"  title="ver" href="#myModal" role="button" data-toggle="modal" onclick="ver(\'' + id + '\')"><i class="icon-zoom-in bigger-130"></i></a>';
                    break;

                case 7:
                    botones_min = '<a class="blue" title="Asignar Indicador" role="button" href="' + $path_base + url + '/' + id + '" role="button" ><i class="icon-plus-sign bigger-150"></i></a>';
                    break;

                case 5:
                    botones_min = '<a class="blue tooltip-info" data-rel="tooltip" title="Asignar Miembros" role="button" href="' + $path_base + url + '/miembros/' + id + '" role="button" ><i class="icon-plus-sign bigger-150"></i></a>';
                    break;

                case 6:
                    botones_min = '<a class="orange tooltip-warning" data-rel="tooltip" title="Ver en PDF" href="#modal-view" role="button" data-toggle="modal" onclick="PDF(\'' + id + '\')"><i class="fa fa-file-pdf-o bigger-130"></i></a>';
                    break;
                case "right":
                    botones_min = '<a class="blue tooltip-info manito" data-rel="tooltip" title="ver cronograma" role="button" data-toggle="modal" onclick="ver_cronograma(' + id + ')"><i class="fa fa-hand-o-right bigger-130"></i></a>';
                    break;
                case 8:
                    botones_min = '<a class="blue tooltip-info" data-rel="tooltip" title="Asignar '+this.accion+'" role="button" href="' + $path_base + url + '/'+this.accion+'/' + id + '" role="button" ><i class="icon-plus-sign bigger-150"></i></a>';
                    break;
            }
    boton1 += botones_min;
    boton2 += botones_min + '</li>';
    boton1 += boton2;
    return boton1;
}