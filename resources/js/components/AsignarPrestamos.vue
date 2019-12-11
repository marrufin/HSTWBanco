<template>
    <div>
        <div class="row">
            <div class="col-xs-12">
                <br>
                <div class="box">
                    <div>
                        <modal-asigprestamo-component @evento="emitterModal" ref="modalAsigPrestamo"></modal-asigprestamo-component>        
                        <div class="row row-test">
                            <div class="col-md-2 pull-right">
                                <button type="button" id="btn-agregar" class="btn btn-block btn-primary" @click="mostrarModalOpciones(true, false)">
                                    <i class="glyphicon glyphicon-plus"></i>&nbsp; Agregar Prestamo
                                </button>
                            </div>
                        </div>
                        <div class="box-header">
                            
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <v-client-table :data="clientes" :columns="columns" :options="options">
                                
                                <template>
                                    <h4>Dirección</h4>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>País</th>
                                                <th>Estado</th>
                                                <th>Ciudad</th>
                                                <th>Colonia</th>
                                                <th>Calle</th>
                                                <th>Entre callles</th>
                                                <th>Número Interior</th>
                                                <th>Número Esterior</th>
                                                <th>Código Postal</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </template>
                            </v-client-table>
                        </div>       
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ModalAsigPrestamo from '../components/Modals/ModalAsigPrestamo.vue'
    import { Settings } from '../objects/settings'
    //import jsPDF from 'jspdf'
    export default {
        components:{
            ModalAsigPrestamo
        }, 
        mounted() {     
            this.obtenerClientes()
        },
        data(){
            return {
                clientes: [],
                cliente: { id: 0, nombre: "", ap_paterno: "",ap_materno: "", 
                           direccion:{id:0, calle:"", num_int:"", num_ext:"", entre_calles:"", codigo_postal:"",
                           colonia:"", ciudad:"", estado:"", pais:""}},
                columns: ['nombre', 'ap_paterno', 'ap_materno', 'fecha_nac', 'curp', 'rfc'],
                options: {
                    headings: {
                        nombre: 'Nombre',
                        ap_paterno: 'Apellido Paterno',
                        ap_materno: 'Apellido Materno',
                        fecha_nac: "Fecha de Nacimiento",
                        curp: "CURP",
                        rfc: "RFC",
                        nombrecooperativas: "Cooperativas",
                        nomproductos: "Productos"
                    },
                    sortable: ['nombre', 'ap_paterno', 'ap_materno'],
                    filterable: ['nombre', 'ap_paterno', 'ap_materno', 'rfc', 'curp'],
                    
                }
            }
        },
        methods: {
            obtenerClientes(){
                let loader = this.$loading.show(Settings.spinner);
                ModalAsigPrestamo.methods.obtenerClientes().then(data => this.clientes = data).finally(function(){
                    setTimeout(() => {
                        loader.hide()
                    },  1000) 
                }) 
            },
            mostrarModalOpciones(opc, datos = ""){
                this.$refs.modalAsigPrestamo.evento = opc
                this.$refs.modalAsigPrestamo.titulo_modal = opc ? "Solicitud de Prestamo" : "Editar Cliente"
                this.$refs.modalAsigPrestamo.cliente = datos == "" ? datos = this.cliente : datos = datos;
                this.$refs.modalAsigPrestamo.showModal = true
            },
            emitterModal(){
                this.obtenerClientes()
            },
            crearPDF(){
                var dat_nom = "Jose Miguel Dueñez Palomo";
                var dat_curp = "dansjbabsd1654";
                var dat_date = "10/12/2019";
                var dat_prest = "Su prestamo a sido aceptado";


                let pdfName = 'Asignacion del Prestamo';
                //var dec = new jsPDF();
                dec.text("Nombre del Cliente: " + dat_nom,10,10);
                dec.text("CURP del Cliente: " + dat_curp,10,20);
                dec.text("Fecha: " + dat_date,150,30);
                dec.text("Estatus del prestamo solicitado: " + dat_prest, 10,40);
                dec.save(pdfName + '.pdf');
                console.log(dec.text);
            }

        }
    }
</script>