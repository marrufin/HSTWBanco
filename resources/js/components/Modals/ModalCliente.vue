<template>
    <div v-if="showModal">
        <div id="modal-default" class="modal fade in show" role="dialog" tabindex="-1" style="overflow-y: scroll;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" @click="showModal = false">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">{{ titulo_modal }}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div :class="{'form-group': true, 'has-error': errors.has('fecha_nac')}">
                                            <label class="control-label" for="text-input">Fecha de Nacimiento</label> <br>   
                                            <date-picker name="fecha_nac" v-model="cliente.fecha_nac" valueType="format" :lang="lang" type="date"></date-picker>   
                                            <span v-show="errors.has('fecha_nac')" class="help-block"><i v-show="errors.has('fecha_nac')" class="fa fa-warning"></i> {{ errors.first('fecha_nac') }}</span>                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div :class="{'form-group': true, 'has-error': errors.has('nombre')}">
                                            <label class="control-label" for="text-input">Nombre</label>
                                            <input name="nombre" v-model="cliente.nombre" v-validate="{required:true, regex:/^[a-zA-Z-Á-ú\s]+$/, max:100}" class="form-control" type="text" placeholder="Nombre">
                                            <span v-show="errors.has('nombre')" class="help-block"><i v-show="errors.has('nombre')" class="fa fa-warning"></i> {{ errors.first('nombre') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div :class="{'form-group': true, 'has-error': errors.has('ap_paterno')}">
                                            <label class="control-label" for="text-input">Apellido Paterno</label>
                                            <input name="ap_paterno" v-model="cliente.ap_paterno" v-validate="{required:true, regex:/^[a-zA-Z-Á-ú\s]+$/, max:100}" class= "form-control" type="text" placeholder="Apellido Paterno">
                                            <span v-show="errors.has('ap_paterno')" class="help-block"><i v-show="errors.has('ap_paterno')" class="fa fa-warning"></i> {{ errors.first('ap_paterno') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div :class="{'form-group': true, 'has-error': errors.has('ap_materno')}">
                                            <label class="control-label" for="text-input">Apellido Materno</label>
                                            <input name="ap_materno" v-model="cliente.ap_materno" v-validate="{required:false, regex:/^[a-zA-Z-Á-ú\s]+$/, max:100}" class="form-control" type="text" placeholder="Apellido Materno">
                                            <span v-show="errors.has('ap_materno')" class="help-block"><i v-show="errors.has('ap_materno')" class="fa fa-warning"></i> {{ errors.first('ap_materno') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div :class="{'form-group': true, 'has-error': errors.has('curp')}">
                                            <label class="control-label" for="text-input">CURP</label>
                                            <input name="curp" v-model="cliente.curp" v-validate="'required|max:50'" class= "form-control" type="text" placeholder="CURP">
                                            <span v-show="errors.has('curp')" class="help-block"><i v-show="errors.has('curp')" class="fa fa-warning"></i> {{ errors.first('curp') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div :class="{'form-group': true, 'has-error': errors.has('rfc')}">
                                            <label class="control-label" for="text-input">RFC</label>
                                            <input name="rfc" v-model="cliente.rfc" v-validate="'required|max:50'" class="form-control" type="text" placeholder="RFC">
                                            <span v-show="errors.has('rfc')" class="help-block"><i v-show="errors.has('rfc')" class="fa fa-warning"></i> {{ errors.first('rfc') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div :class="{'form-group': true, 'has-error': errors.has('pais')}">
                                            <label class="control-label" for="text-input">País</label>
                                            <input name="pais" v-model="cliente.direccion.pais" v-validate="'required|max:100'" class= "form-control" type="text" placeholder="País">
                                            <span v-show="errors.has('pais')" class="help-block"><i v-show="errors.has('pais')" class="fa fa-warning"></i> {{ errors.first('pais') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div :class="{'form-group': true, 'has-error': errors.has('estado')}">
                                            <label class="control-label" for="text-input">Estado</label>
                                            <input name="estado" v-model="cliente.direccion.estado" v-validate="'required|max:100'" class="form-control" type="text" placeholder="Estado">
                                            <span v-show="errors.has('estado')" class="help-block"><i v-show="errors.has('estado')" class="fa fa-warning"></i> {{ errors.first('estado') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div :class="{'form-group': true, 'has-error': errors.has('ciudad')}">
                                            <label class="control-label" for="text-input">Ciudad</label>
                                            <input name="ciudad" v-model="cliente.direccion.ciudad" v-validate="'required|max:100'" class= "form-control" type="text" placeholder="Ciudad">
                                            <span v-show="errors.has('ciudad')" class="help-block"><i v-show="errors.has('ciudad')" class="fa fa-warning"></i> {{ errors.first('ciudad') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div :class="{'form-group': true, 'has-error': errors.has('colonia')}">
                                            <label class="control-label" for="text-input">Colonia</label>
                                            <input name="colonia" v-model="cliente.direccion.colonia" v-validate="'required|max:100'" class="form-control" type="text" placeholder="Colonia">
                                            <span v-show="errors.has('colonia')" class="help-block"><i v-show="errors.has('colonia')" class="fa fa-warning"></i> {{ errors.first('colonia') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div :class="{'form-group': true, 'has-error': errors.has('calle')}">
                                            <label class="control-label" for="text-input">Calle</label>
                                            <input name="calle" v-model="cliente.direccion.calle" v-validate="'required|max:50'" class= "form-control" type="text" placeholder="Calle">
                                            <span v-show="errors.has('calle')" class="help-block"><i v-show="errors.has('calle')" class="fa fa-warning"></i> {{ errors.first('calle') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div :class="{'form-group': true, 'has-error': errors.has('entre_calles')}">
                                            <label class="control-label" for="text-input">Entre calles</label>
                                            <input name="entre_calles" v-model="cliente.direccion.entre_calles" v-validate="'max:100'" class="form-control" type="text" placeholder="Entre calles">
                                            <span v-show="errors.has('entre_calles')" class="help-block"><i v-show="errors.has('entre_calles')" class="fa fa-warning"></i> {{ errors.first('entre_calles') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div :class="{'form-group': true, 'has-error': errors.has('num_int')}">
                                            <label class="control-label" for="text-input">Numero int.</label>
                                            <input name="num_int" v-model="cliente.direccion.num_int" v-validate="'numeric|max:10'" class= "form-control" type="text" placeholder="Número Interior">
                                            <span v-show="errors.has('num_int')" class="help-block"><i v-show="errors.has('num_int')" class="fa fa-warning"></i> {{ errors.first('num_int') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div :class="{'form-group': true, 'has-error': errors.has('num_ext')}">
                                            <label class="control-label" for="text-input">Número ext</label>
                                            <input name="num_ext" v-model="cliente.direccion.num_ext" v-validate="'numeric|max:10'" class="form-control" type="text" placeholder="Múmero Exterior">
                                            <span v-show="errors.has('num_ext')" class="help-block"><i v-show="errors.has('num_ext')" class="fa fa-warning"></i> {{ errors.first('num_ext') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div :class="{'form-group': true, 'has-error': errors.has('cp')}">
                                            <label class="control-label" for="text-input">Código Postal</label>
                                            <input name="cp" v-model="cliente.direccion.codigo_postal" v-validate="'numeric|max:15'" class="form-control" type="text" placeholder="Código Postal">
                                            <span v-show="errors.has('cp')" class="help-block"><i v-show="errors.has('cp')" class="fa fa-warning"></i> {{ errors.first('cp') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" @click="showModal = false">Cerrar</button>
                        <button type="button" class="btn btn-primary" @click="actions">{{evento ? "Guardar" : "Editar"}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { Settings } from '../../objects/settings'
    import 'vuejs-noty/dist/vuejs-noty.css'
    import DatePicker from 'vue2-datepicker'
    
    export default {
        name: "ModalCliente",
        components: {
            DatePicker
        },
        data(){
            return {
                titulo_modal: "Agregar Cliente",
                evento: true,
                cliente:{id:0, nombre:"", ap_paterno:"", ap_materno:"", curp:"", rfc:"", fecha_nac:"",
                        direccion:{id:0, pais:"", estado:"", ciudad:"", colonia:"",calle:"", entre_calles:"",num_int:"",
                        num_ext:"",codigo_postal:""}
                        },
                showModal: false,
                lang: Settings.lang
            }
        },
        updated(){
            this.clearForm()
        },
        methods:{
            obtenerClientes(){
                return axios.post(window.location.pathname)
                    .then((res) => {
                        return res.data
                    }).catch((err) => {
                        console.log(err)
                    })
            },
            actions(){
                this.$validator.validateAll().then((res) => {
                    if(res){
                        if(this.evento){
                            axios.post(window.location.pathname, {
                                'evento': 'crear',
                                'cliente': this.cliente,
                            }).then(response => {
                                this.showModal = false
                                this.$noty.success(response.data.msg)
                                this.$emit('evento')
                            }).catch((error) => {
                                $.each(error.response.data.errors,(index, value) => {
                                    this.$noty.error(value)
                                });
                            });
                        }
                        else
                        {
                            axios.put(window.location.pathname, {
                                'cliente' : this.cliente
                            }).then(response => {
                                this.showModal = false
                                this.$noty.success(response.data.msg)
                                this.$emit('evento')
                            }).catch((error) => {
                                $.each(error.response.data.errors,(index, value) => {
                                    this.$noty.error(value)
                                });
                            });
                        }
                        return
                    }
                    this.$noty.error("Los campos en rojo son necesarios.")
                });
            },
            clearForm(){
                if(!this.showModal && this.evento){
                    for (const key in this.cliente) {
                        this.cliente[key] = ""
                    }
                    this.cliente.direccion = {}
                    this.$validator.pause()
                    this.$nextTick(() => this.$validator.resume())
                }
            },
        }
    }
</script>
<style lang="css" scoped>
    [name="curp"] {
        text-transform: uppercase;
    }
</style>
