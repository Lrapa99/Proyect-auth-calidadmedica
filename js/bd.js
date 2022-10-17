$(document).ready(() => {
  console.log('bd.js "ok"');

  $("table#servis").css("display", "none"); //*ocultamos la tabla:

  //*mostrar encabezados de la tabla:

  const tblhdr = $("table#servis th")
    .map(function () {
      return $(this).text();
    })
    .get();

  //console.log(tblhdr);

  //*funcion para obtener los datos de la tabla, que contiene todos los registros de la base de datos, para luego almacenarlos dentro de objetos:

  const tbl = $("table#servis tbody tr")
    .map(function (idx, el) {
      const td = $(el).find("td");
      const obj = { id: idx + 1 };

      //Can work on number of columns
      for (let i = 0; i < tblhdr.length; i++) {
        obj[tblhdr[i]] = td.eq(i).text();
      }

      return obj;
    })
    .get();

  //*funcion para ingresar los servicios en las opciones del select:

  const getValuesServis = () => {
    for (let servis of tbl) {
      $("#selectServis").append(`<option>${servis["Descripcion"]}</option>`);
    }
  };
  getValuesServis();

  //*funcion para limpiar los campos:

  function clearInputs() {
    $("#cups").text("");
    $("#servicio").text("");
    $("#valor").text("");
    $("#cantidad").val("");
    $("#valorTotal").text("$ 0");
  }

  //*funcion para obtener los valores del select, y asignarlos en los campos:

  const getValuesInputs = () => {
    let inicial = $("#selectServis").val();
    $("#selectServis").change(function () {
      if ($("#selectServis").val() !== inicial) {
        for (let servis of tbl) {
          if ($("#selectServis").val() == servis["Descripcion"]) {
            let servicio = servis["Descripcion"];
            var valor = servis["Valor"];
            let cups = servis["Cups"];

            $(".inputCampos1").attr("id", "");
            if ($("#cups").text() === "") {
              var newValorServicio1 = new Intl.NumberFormat("es-419").format(
                valor
              );
              $("#cups").text(cups);
              $("#servicio").text(servicio);
              $("#valor").text(`$ ${newValorServicio1}`);
              $("#cantidad").val(1);

              //$("#valorTotal").text(`$ ${newValorServicio1}`);
            }
            if ($(".inputCampos2").attr("id") !== "inputCampos2") {
              var newValorServicio2 = new Intl.NumberFormat("es-419").format(
                valor
              );
              if ($("#cups2").text() === "") {
                $("#cups2").text(cups);
                $("#servicio2").text(servicio);
                $("#valor2").text(`$ ${newValorServicio2}`);
                $("#cantidad2").val(1);

                //$("#valorTotal").text(`$ ${newValorServicio3}`);
              }
            }
            if ($(".inputCampos3").attr("id") !== "inputCampos3") {
              var newValorServicio3 = new Intl.NumberFormat("es-419").format(
                valor
              );
              if ($("#cups3").text() === "") {
                $("#cups3").text(cups);
                $("#servicio3").text(servicio);
                $("#valor3").text(`$ ${newValorServicio3}`);
                $("#cantidad3").val(1);

                //$("#valorTotal").text(`$ ${newValorServicio3}`);
              }
            }
            if ($(".inputCampos4").attr("id") !== "inputCampos4") {
              var newValorServicio4 = new Intl.NumberFormat("es-419").format(
                valor
              );
              if ($("#cups4").text() === "") {
                $("#cups4").text(cups);
                $("#servicio4").text(servicio);
                $("#valor4").text(`$ ${newValorServicio4}`);
                $("#cantidad4").val(1);

                //$("#valorTotal").text(`$ ${newValorServicio4}`);
              }
            }

            //$("#selectServis").val('')
          }
        }
      } else {
        clearInputs();
      }

      hiddenNotaContraste();
    });

    //*funcion para detectar cambios en las cantidades y sumar los valores:

    $("#cantidad").change(function () {
      let iniCant = $("#cantidad").val();
      if ($("#cantidad").val() !== iniCant) {
        for (let servis of tbl) {
          //console.log(val);

          if ($("#cups").text() == servis["Cups"]) {
            let valor = servis["Valor"];
            let newValorServicio = new Intl.NumberFormat("es-419").format(
              valor * $("#cantidad").val()
            );
            $("#valor").text(`$ ${newValorServicio}`);

            //$("#valorTotal").text(`$ ${newValorServicio}`);
          }
        }
      }
    });

    $("#cantidad2").change(function () {
      let iniCant2 = $("#cantidad2").val();
      if ($("#cantidad2").val() !== iniCant2) {
        for (let servis of tbl) {
          //console.log(val);

          if ($("#cups2").text() == servis["Cups"]) {
            let valor = servis["Valor"];
            let newValorServicio = new Intl.NumberFormat("es-419").format(
              valor * $("#cantidad2").val()
            );
            $("#valor2").text(`$ ${newValorServicio}`);

            //$("#valorTotal").text(`$ ${newValorServicio}`);
          }
        }
      }
    });

    $("#cantidad3").change(function () {
      let iniCant3 = $("#cantidad3").val();
      if ($("#cantidad3").val() !== iniCant3) {
        for (let servis of tbl) {
          //console.log(val);

          if ($("#cups3").text() == servis["Cups"]) {
            let valor = servis["Valor"];
            let newValorServicio = new Intl.NumberFormat("es-419").format(
              valor * $("#cantidad3").val()
            );
            $("#valor3").text(`$ ${newValorServicio}`);

            //$("#valorTotal").text(`$ ${newValorServicio}`);
          }
        }
      }
    });

    $("#cantidad4").change(function () {
      let iniCant4 = $("#cantidad4").val();
      if ($("#cantidad4").val() !== iniCant4) {
        for (let servis of tbl) {
          //console.log(val);

          if ($("#cups4").text() == servis["Cups"]) {
            let valor = servis["Valor"];
            let newValorServicio = new Intl.NumberFormat("es-419").format(
              valor * $("#cantidad4").val()
            );
            $("#valor4").text(`$ ${newValorServicio}`);

            //$("#valorTotal").text(`$ ${newValorServicio}`);
          }
        }
      }
    });
  };
  getValuesInputs();

  //*funcion para agregar nuevos campos al hacer click en el icono+:

  $("#addServis").click(() => {
    //*funcion para ocultar y mostrar nota de medio de contraste:
    function hiddenNotaContrate() {
      let cadena1 = $("#servicio").text(),
        cadena2 = $("#servicio2").text(),
        cadena3 = $("#servicio3").text(),
        cadena4 = $("#servicio4").text();

      //console.log(cadena1, cadena2, cadena3, cadena4);
      let espression = /CONTRASTE/; //?espresion regular, para buscar texto

      let index1 = cadena1.search(espression),
        index2 = cadena2.search(espression),
        index3 = cadena3.search(espression),
        index4 = cadena4.search(espression);

      if (index1 >= 0 || index2 >= 0 || index3 >= 0 || index4 >= 0) {
        // console.log("contraste encontrado");
        $(".content__parte5_notaMedioDeContraste").css("display", "block");
      } else {
        //console.log("contraste no encontrado");
        $(".content__parte5_notaMedioDeContraste").css("display", "none");
      }
    }

    console.log("add");

    $("#selectServis").val("Seleccionar Servicio");

    if ($("#selectServis").val() !== "") {
      $(".deleteServis1").click(() => {
        $("#cups").text("");
        $("#servicio").text("");
        $("#valor").text("");
        $("#cantidad").val("");
        $(".inputCampos1").attr("id", "inputCampos1");
        hiddenNotaContrate();
        $("#selectServis").val("Seleccionar Servicio");
      });
    }

    //*funcion para agregar los demas campos:

    function assignValueToRestField(
      inicial = "",
      inputCamp = "",
      deleteServis = "",
      deleteServisPrevious = ""
    ) {
      if ($(`#cups${inicial}`).text() !== "") {
        //*comprobar si el campo anterior esta vacio
        $(`.inputCampos${inputCamp}`).attr("id", ""); //*mostrar nuevo campo

        // if (inicial !== '') {
        $(`.deleteServis${deleteServisPrevious}`).attr("id", ""); //*quitar hover btn ocultar en campo anterior
        // }

        $(`.deleteServis${deleteServis}`).click(() => {
          //*click en btb ocultar campo actual
          $(`.deleteServis${deleteServisPrevious}`).attr(
            "id",
            `deleteServis${deleteServisPrevious}`
          ); //*mostrar hover btn ocultar campo anterior
          $(`#cups${inputCamp}`).text(""); //*limpiar datos cups
          $(`#servicio${inputCamp}`).text(""); //*limpiar datos servicio
          $(`#valor${inputCamp}`).text(""); //*limpiar datos valor
          $(`#cantidad${inputCamp}`).val(""); //*limpiar datos cantidad
          $(`.inputCampos${inputCamp}`).attr("id", `inputCampos${inputCamp}`); //*ocultar campo actual
          hiddenNotaContrate(); //* ejecutar funcion para mostrar o no nota medio de contraste
        });
      }
    }

    assignValueToRestField("", 2, 2, 1);
    assignValueToRestField(2, 3, 3, 2);
    assignValueToRestField(3, 4, 4, 3);
  });
});
