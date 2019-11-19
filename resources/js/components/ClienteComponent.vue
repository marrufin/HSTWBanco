<template>
    <div>
        <modal-cliente-component @click="emitterModal" ref="modalCliente"></modal-cliente-component>        
        <div class="row">
            <div class="col-md-2 pull-right">
                <button type="button" class="btn btn-block btn-primary" @click="mostrarModalOpciones(true, false)">
                    <i class="glyphicon glyphicon-plus"></i>&nbsp; Agregar
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <br>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Información de clientes</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <v-client-table :data="clientes" :columns="columns" :options="options">
                            <button slot="acciones" slot-scope="props" type="button" @click="mostrarModalOpciones(false, props.row)" class="btn btn-info btn-sm">
                                <i class="glyphicon glyphicon-pencil"></i> &nbsp; Editar
                            </button> &nbsp;
                        </v-client-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    import ModalCliente from '../components/Modals/ModalCliente.vue'
    import { Settings } from '../objects/settings'
    export default {
        components:{
            ModalCliente
        },    
        mounted() {     
            //this.obtenerClientes()
        },
        data(){
            return {
                clientes: [],
                cliente: { id: 0, nombre: "", apellido_paterno: "",apellido_materno: "", 
                           direccion:{id:0, calle:"", num_int:"", num_ext:"", entre_calles:"", codigo_postal:"",
                           colonia:"", ciudad:"", estado:"", pais:""}},
                columns: ['nombre', 'apellido_paterno', 'apellido_materno', 'fecha_nacimiento', 'curp', 'rfc','acciones'],
                options: {
                    headings: {
                        nombre: 'Nombre',
                        apellido_paterno: 'Apellido Paterno',
                        apellido_materno: 'Apellido Materno',
                        fecha_nacimiento: "Fecha de Nacimiento",
                        curp: "CURP",
                        rfc: "RFC",
                        nombrecooperativas: "Cooperativas",
                        nomproductos: "Productos",
                        acciones: 'Acciones'
                    },
                    sortable: ['nombre', 'apellido_paterno', 'apellido_materno'],
                    filterable: ['nombre', 'apellido_paterno', 'apellido_materno', 'rfc', 'curp'],
                    
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
                setTimeout(() => {
                    loader.hide()
                },  1000) 
            },
            mostrarModalOpciones(opc, datos = ""){
                this.$refs.modalCliente.evento = opc
                this.$refs.modalCliente.titulo_modal = opc ? "Agregar Cliente" : "Editar Cliente"
                this.$refs.modalCliente.cliente = datos == "" ? datos = this.cliente : datos = datos;
                this.$refs.modalCliente.showModal = true
            },
            emitterModal(){
                this.obtenerClientes()
            },
        }
    }
</script>