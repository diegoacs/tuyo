

//--- 001 VARIABLES GLOBALES A USAR -----------------------------------------------------------
var route='http://localhost/cdig/index.php/';
var linkEntidad='';

function additionalClassSel(cl,add){
    var selected = $(cl).find('option:selected');
    var extra = selected.data(add);
    return extra;
}

function additionalIdSel(id,add){
    var selected = $(id).find('option:selected');
    var extra = selected.data(add);
    return extra;
}


//encontrar valores de columna 
function valCol(place,num){
    return $(place).closest('tr').find('td:eq('+num+')').text();
}


// inicializar tooltips
$('[data-toggle="tooltip"]').tooltip();
// clase para campos numericos
$(".mFor").number(true,2);
// clase para numeros enteros
$(".intFor").number(true,0);
// clase para longitud y latitud
$(".coorFor").number(true,6);

// validando fechas

function valiDate(date){
    var d=date.split('-');
    fch=new Date(d[0],d[1],d[2]);
    if(d[0] != fch.getFullYear() || d[1] != fch.getMonth() || d[2] != fch.getDate()) return false;
    else return true;
}

function obtainToday(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    if(dd<10) {
        dd = '0'+dd
    } 

    if(mm<10) {
        mm = '0'+mm
    } 

    return yyyy + '-' + mm + '-' + dd;
}

function sumaDias(fecha,nume){

    f=fecha.split('-');
    var yyyy=f[0];
    var mm=f[1];
    var dd=parseInt(f[2],10)+parseInt(nume,10);

    if(dd<10) {
        dd = '0'+dd
    } 

    if(mm<10) {
        mm = '0'+mm
    } 
    return yyyy + '-' + mm + '-' + dd;
}

function formatN(num){
    num=num.replace('$','');
    num=num.split(',');
    num=num.join('');
    return num;
}

// vefifica session cada tiempo
function verifySess(){
    $.ajax({
       type:'POST',
       url:route+'Log_usr/verifiSession',
       data:'',
       dataType:'text',
       success: function (r)
       {
            if(r=='2') {
                bootbox.alert({
                    message: "Su sesion se ha perdido por inactividad, vuelva a conectarse.",
                    className: 'bb-alternate-modal',
                    callback: function () {
                        window.close();
                        return false;
                    }
                });
            }
       },
       error: function()
       {
            bootbox.alert({
                message: "Hubo problemas con la conexion, por favor comuniquese con su administrador.",
                className: 'bb-alternate-modal',
                callback: function () {
                    window.close();
                    return false;
                }
            });                                            
       }        
    });
}

//--- 002 FUNCIONES GLOBALES A USAR -----------------------------------------------------------
function derCeros(id,num,str){
    str=str.toString(); id=id.toString();
    while (id.length < num){
        id=str+id;
    }
    return id;
}

function showMsg(data){
  BootstrapDialog.show({
    title: 'Información',
    message: data
  });
}


//--- 003 FUNCIONES PARA RESERVAS EN  CALENDARIOS ---------------------------------------------
    function getCat(){
        var rta='';
        $.ajax({
            type:'POST',
            url:route+'sys_schedule/sys_habitaciones/getsel',
            dataType:'text',
            success: function (data){rta=data;}
        });
        return rta;
    }

// --- bootbox.js functions for using ----
function obserMsg(titulo,callback){
  bootbox.prompt({
    title: titulo,
    inputType: 'textarea',
    callback: function (result) {
        if(result) callback(result);
    }
  });
}



function adviceMsg(msg,yes,no,callback){

        bootbox.confirm({
        message: msg,
        size: 'small',
        buttons: {
            confirm: {
                label: '<i class="fa fa-check"></i> '+yes,
                className: 'btn-success'
            },
            cancel: {
                label: '<i class="fa fa-ban"></i> '+no,
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if(result) callback(true);
        }
    });
}

function alertMsg(msg){

    bootbox.alert({
        message: msg,
        size: 'small'
    });
}

function PleaseWait(msg){
    
    bootbox.dialog({
        message: '<p><i class="fa fa-spin fa-spinner"></i> '+msg+'</p>',
        closeButton: false
    });
}


$(".choseEnti").click(function(){
    linkEntidad=$(this).data("linke");
    window.open(linkEntidad,"_self");
});


function ajaxRqst(datos,ruta,tipo,dtipo,callback){
    $.ajax({
       type:'POST',
       url:route+'Log_usr/verifiSession',
       data:'',
       dataType:'text',
       success: function (r)
       {
            if(r=='2') {
                // alertMsg('Se ha perdido la sesion, vuelva a conectarse.');
                // window.open(route,'_self');
                bootbox.alert({
                    message: "Su sesion se ha perdido por inactividad, vuelva a conectarse.",
                    className: 'bb-alternate-modal',
                    callback: function () {
                        window.open(route,'_self');
                        return false;
                    }
                });
            }
            $.ajax({
                type:tipo,url:ruta,data:datos,dataType:dtipo,success: function (rt){callback(rt);},error: function(){callback('2');}
            });
       },
       error: function()
       {
            alertMsg('Hubo un error en la conexion, comuniquese con su administrador.');
            return false;                                               
       }        
    });
}

function ajaxRqst2(datos,ruta,tipo,dtipo,callback){
    $.ajax({
       type:'POST',
       url:route+'Log_usr/verifiSession',
       data:'',
       dataType:'text',
       success: function (r)
       {
            if(r=='2') {
                bootbox.alert({
                    message: "Su sesion se ha perdido por inactividad, vuelva a conectarse.",
                    className: 'bb-alternate-modal',
                    callback: function () {
                        window.open(route,'_self');
                        return false;
                    }
                });
            }
            $.ajax({
                type:tipo,url:ruta,data:datos,dataType:dtipo,success: function (rt){callback(rt);},error: function(){callback('ERRINC');}
            });
       },
       error: function()
       {
            alertMsg('Hubo un error en la conexion, comuniquese con su administrador.');
            return false;                                               
       }        
    });
}

function cleanBox(){
    $(".cleanBox").each(function(){
        $(this).val('');
    });
}

function cleanSelect(){
    $(".cleanSlect").each(function(){
        $(this).empty();
    });
}

function cleanClass(Sclass){
    $(Sclass).each(function(){
    $(this).val('');
  });
}