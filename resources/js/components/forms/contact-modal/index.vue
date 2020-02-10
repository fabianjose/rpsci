<template>
    <div class="modal fade" id="modalConsultOffer" aria-modal="true">
        <div class="modal-dialog modal-xl modal-xl-xl d-flex flex-row justify-content-center">
            <div class="consult-card p-0 flex-wrap modal-content">
                <div class="col-lg-7 col-xl-7 col-md-7 col-12 d-flex flex-column p-3">
                    <div class="consult-card-content">
                        <div class="consult-card-header pt-4 pb-3">
                            <img :src="baseUrl+'/storage/'+offer.company_logo" alt="logo" class="col-10">
                        </div>
                        <div class="consult-card-benefits py-3">
                            <h6 class="col-12 consult-card-sub-title py-1 m-0">Beneficios:</h6>
                            <h6 class="col-12 benefits-content text-wrap">{{offer.benefits}}</h6>
                        </div>
                        <div class="consult-card-fields">
                            <div class="consult-card-field col-6" v-for="(fieldValue,k) in offer.fields_values" :key="k">
                                <h6 class="consult-card-sub-title py-1 m-0">{{fieldValue.field_name}}:</h6>
                                <h6 class="field-content">{{fieldValue.value}} {{fieldValue.unit?fieldValue.unit:""}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-5 col-md-5 col-12 bg-main-blue p-3 form-consulting-field">
                    <div class="form-consulting-header">
                        <span class="form-consulting-title py-3 text-wrap">Consulta sin compromiso</span>
                    </div>
                    <div class="form-group col-12 my-2">
                        <label class="text-white">Nombre y Apellido</label>
                        <div class="form-group has-search d-flex align-items-center">
                            <span class="fas fa-user form-control-feedback text-white"></span>
                            <input v-model="fullName" class="form-control form-consulting-input rounded-pill rounded-input" type="text">
                        </div>  
                    </div>
                    <div class="form-group col-12 my-2">
                        <label class="text-white">Correo electrónico</label>
                        <div class="form-group has-search d-flex align-items-center">
                            <span class="fas fa-mail-bulk form-control-feedback text-white"></span>
                            <input v-model="email" class="form-control form-consulting-input rounded-pill rounded-input" type="text">
                        </div>  
                    </div>
                    <div class="form-group col-12 my-2">
                        <label class="text-white">Nro de Teléfono</label>
                        <div class="form-group has-search d-flex align-items-center">
                            <span class="fas fa-phone form-control-feedback text-white"></span>
                            <input v-model="phone" class="form-control form-consulting-input rounded-pill rounded-input" type="text">
                        </div>  
                    </div>
                    <vue-recaptcha size="invisible" :sitekey="reCaptchaKey" :loadRecaptchaScript="true" ></vue-recaptcha>
                    <div class="col-12 my-2 p-3 mx-auto" >
                        <button @click="sendMail" class="btn btn-block btn-dark-blue rounded-pill">
                            CONSULTAR
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    props:["offer", "fields"],

    data(){
        return {
            fullName:"",
            email:"",
            phone:"",
            baseUrl:baseUrl,
        }
    },

    mounted(){
        console.log(this.reCaptchaKey);
    },

    methods:{
        sendMail(){
            
        }
    },

    computed:{

        reCaptchaKey: {
            get(){
                return window.reCaptchaKey;
            }
        },

    }
    
}
</script>
