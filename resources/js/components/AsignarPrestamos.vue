<template>
    <div>
        <div class="row">
            <div class="col-xs-12">
                <br>
                <div class="box">
                    <div>
                        <div class="box-header">
                            <h3 class="box-title">Asignacion de Prestamos :)</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <v-client-table :data="clientes" :columns="columns" :options="options">
                                <button slot="acciones" type="button" @click="crearPDF" class="btn btn-danger btn-sm">
                                    <i class=" glyphicon glyphicon-paperclip "></i> &nbsp; PDF
                                </button> &nbsp;
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
    import ModalCliente from '../components/Modals/ModalCliente.vue'
    import { Settings } from '../objects/settings'
    import jsPDF from 'jspdf'
    export default {
        mounted() {     
            this.obtenerClientes()
        },
        data(){
            return {
                clientes: [],
                cliente: { id: 0, nombre: "", ap_paterno: "",ap_materno: "", 
                           direccion:{id:0, calle:"", num_int:"", num_ext:"", entre_calles:"", codigo_postal:"",
                           colonia:"", ciudad:"", estado:"", pais:""}},
                columns: ['nombre', 'ap_paterno', 'ap_materno', 'fecha_nac', 'curp', 'rfc','acciones'],
                options: {
                    headings: {
                        nombre: 'Nombre',
                        ap_paterno: 'Apellido Paterno',
                        ap_materno: 'Apellido Materno',
                        fecha_nac: "Fecha de Nacimiento",
                        curp: "CURP",
                        rfc: "RFC",
                        nombrecooperativas: "Cooperativas",
                        nomproductos: "Productos",
                        acciones: 'Acciones'
                    },
                    sortable: ['nombre', 'ap_paterno', 'ap_materno'],
                    filterable: ['nombre', 'ap_paterno', 'ap_materno', 'rfc', 'curp'],
                    
                }
            }
        },
        methods: {
            obtenerClientes(){
                let loader = this.$loading.show(Settings.spinner);
                ModalCliente.methods.obtenerClientes().then(data => this.clientes = data).finally(function(){
                    setTimeout(() => {
                        loader.hide()
                    },  1000) 
                }) 
            },
            crearPDF(){
                let pdfName = 'test';
                var dec = new jsPDF();
                dec.text("Hello",10,10);
                dec.save(pdfName + '.pdf');
                console.log(dec.text);
            }

        }
    }
</script>