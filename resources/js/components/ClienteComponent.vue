<template>
    <div>
        <modal-cliente-component @evento="emitterModal" ref="modalCliente"></modal-cliente-component>        
        <div class="row row-test">
            <div class="col-md-2 pull-right">
                <button type="button" id="btn-agregar" class="btn btn-block btn-primary" @click="mostrarModalOpciones(true, false)">
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
                            <template slot="child_row" slot-scope="props">
                                <h4>Dirección</h4>
                              <table class="table">
                                  <thead>
                                      <tr>
                                          <th>País</th>
                                          <th>Estado</th>
                                          <th>Ciudad</th>
                                          <th>Colonia</th>
                                          <th>Calle</th>
                                          <th>Entre calles</th>
                                          <th>Número Interior</th>
                                          <th>Número Exterior</th> 
                                          <th>Código Postal</th> 
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td>{{ props.row.direccion.pais }}</td>
                                          <td>{{ props.row.direccion.estado }}</td>
                                          <td>{{ props.row.direccion.ciudad }}</td>
                                          <td>{{ props.row.direccion.colonia }}</td>
                                          <td>{{ props.row.direccion.calle }}</td>
                                          <td>{{ props.row.direccion.entre_calles }}</td>
                                          <td>{{ props.row.direccion.num_int }}</td>
                                          <td>{{ props.row.direccion.num_ext }}</td>
                                          <td>{{ props.row.direccion.codigo_postal }}</td>
                                      </tr>
                                  </tbody>
                              </table>
                            </template>
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
            mostrarModalOpciones(opc, datos = ""){
                console.log(datos);
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
<style>
    .VueTables__child-row-toggler {
        width: 16px;
        height: 16px;
        line-height: 16px;
        display: block;
        margin: auto;
        text-align: center;
    }
 
    .VueTables__child-row-toggler--closed::before {
        font-family: FontAwesome;
        content: "\f06e";
        text-align: center;
        color:#3490dc;
        font-size: 1.5em;
    }
 
    .VueTables__child-row-toggler--open::before {
        font-family: FontAwesome;
        content: "\f070";
        text-align: center;
        color:#3490dc;
        font-size: 1.5em;
    }
</style>
<style lang="scss" scoped>
    @import './resources/sass/_variables.scss';
    #btn-agregar {
        background-color: $blue;
    }
</style>