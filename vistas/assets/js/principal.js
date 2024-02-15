$(document).ready(function () {
let contenido_etiquetas;
let vars;
    var datos = new FormData();
    var iddetverif = "Si";
    //alert("El id de el acta es = " + idconst);
    datos.append("graph", iddetverif);
    $.ajax({
        url: "ajax/grafica_ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (datos) {
            
             contenido_etiquetas = datos.split(',');

           
            var datos = new FormData();
            var iddetverif = "Si";
            //alert("El id de el acta es = " + idconst);
            datos.append("graphval", iddetverif);
            $.ajax({
                url: "ajax/grafica_ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (datos) {
                  
                    vars = datos.split(',');
                      
                         
            var vistas = vars ,
                  etiquetas = contenido_etiquetas;
                  
              var opciones = {
                  // Los colores. En este caso sólo es uno pero puede haber más si tenemos más datos
                  // por ejemplo si mostrásemos del 2018 y 2019
                  colors: [' #2471a3 '],
                  chart: {
                      height: 380, //La altura. La anchura es tomada como el 100 % del padre
                      type: 'line',// Es una gráfica de tipo area
                  },
                  stroke: {
                      //La curvatura al unir los puntos
                      //smooth o straight. smooth es más suave y straight es rígido
                      curve: 'smooth',
                  },
                  dataLabels: {
                      enabled: false, // No mostrar las etiquetas sin hacer hover
                  },
                  series: [{
                      name: "Número de visitas", // Lo que describe a nuestros datos
                      data: vistas
                  },
                  ],
                  title: {
                      text: 'Visitas por verificador', //El título como cadena
                      align: 'left', //Alineación. Puede ser left, right o center
                  },
                  subtitle: {
                      text: 'Padron de verificadores',//Subtítulo. Si no queremos incluirlo, eliminamos todo este objeto
                      align: 'left', //La alineación aplica igual que para el título
                  },
                  xaxis: {
                      // Lo que irá en el eje X.
                      // Su longitud debe ser igual a la de los datos
                      // Es decir, si nuestros datos son 12, las etiquetas deben ser 12
                      categories: etiquetas,
                  },
                  yaxis: {
                      //Si queremos que el eje y esté a la izquierda lo dejamos en false. Si queremos
                      // que esté a la derecha, pues en true
                      opposite: true,
                  }
              };
              var elemento = document.querySelector("#chart-container");//El id del div, con todo y #
              var grafica = new ApexCharts(elemento, opciones);
              grafica.render();// La gráfica no será creada hasta llamar a este método
              ///////////////////////////////////////////////////////////////////////////
       
                    }
                   
                })
        }
            })



       
            ///////////////////////////////////////////////////////////////////////////
            $(function() { 
                cron(); 
                function cron() {
                    var idconst = 1;
                    var datos = new FormData();
                    //alert("El id de el acta es = " + idconst);
                    datos.append("Actpills", idconst);
                    $.ajax({
                        url: "ajax/valores_dash_ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function(respuesta) {
                            $('.total').text(respuesta['Total']);
                            $('.activ').text(respuesta['Activos']);
                            $('.inact').text(respuesta['inactivos']);
                            
                               
                            }              
                         })           
        
                }
                setInterval(function() {
                    cron();
                }, 7000); // Lanzará la petición cada 7 segundos
            });

        });
///////////////////////////////////////////////////////////////////////////////
