<template>
    <div class="d-flex justify-content-center contacto-main-content row">
		<div class="card card-primary contacto-card flex-wrap bg-light p-3 col-10 col-sm-10 col-md-10 col-lg-4 col-xl-4">
            <div class="card-body d-flex flex-column align-items-center pt-4 w-100">
                <h5 class="contacto-card-title font-weight-bold text-center">Ponte en contacto con nosotros</h5>
                <div class="d-flex flex-column w-100 py-3">
                    <div class="form-group my-2">
                        <label>Datos de Contacto</label>
                        <input type="text" v-model="fullName" class="form-control rounded-pill" placeholder="Nombre y Apellido">
                    </div>
                    <div class="d-flex w-100 flex-wrap px-0">
                        <div class="form-group my-2 col-md-6 col-12 col-lg-12 col-xl-12 pl-0 pr-md-1 pr-0">
                            <input v-model="email" type="text" class="form-control rounded-pill" placeholder="Correo Electronico">
                        </div>
                        <div class="form-group my-2 col-md-6 col-12 col-lg-12 col-xl-12 pr-0 pl-md-1 pl-0">
                            <input v-model="phone" type="text" class="form-control rounded-pill" placeholder="No. Teléfono">
                        </div>
                    </div>
                    <div class="form-group my-2">
                        <zone-select :notNullable="true" @newDepartment="newDepartment" :hideMunicipality="true" middle="col-12" ></zone-select>
                    </div>
                    <div class="form-group my-2">
                        <label>Mensaje adicional</label>
                        <textarea v-model="message" rows="8" class="form-control w-100" placeholder="Mensaje..."></textarea>
                    </div>
                </div>
                <div class="col-12 my-2 d-flex justify-content-center align-items-center">
                    <!--<vue-recaptcha @error="onCaptchaError" @expired="onCaptchaExpired" @verify="verifyCaptcha" 
                        class="col-12 v-captcha" :sitekey="reCaptchaKey" :loadRecaptchaScript="true" >
                    </vue-recaptcha>-->
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end pt-2 pb-2 bg-light">
                <div class="col-8">
                    <button @click="sendMail" class="btn btn-block btn-dark-blue rounded-pill text-center">
                    Enviar
                    </button>
                </div>
            </div>
	  </div>
      <div class="col-10 col-sm-10 col-md-10 col-lg-7 col-xl-7 d-flex flex-column p-4 align-items-center">

        <h5 class="contacto-card-title mt-4 font-weight-bold text-center">Ubícanos</h5>

        <GmapMap
            :center="{lat:4.613033, lng:-74.144560}"
            :zoom="17"
            map-type-id="roadmap"
            style="width: 90%; height: 550px"
        >
        <GmapMarker
            :position="{lat:4.613033, lng:-74.144560}"
            :clickable="false"
            :draggable="false"
        />
        </GmapMap>
      </div>
	</div>
</template>

<script>
export default {
    data(){
        return {
            fullName:"",
            email:"",
            phone:"",
            department:"",
            message:"",
            baseUrl:baseUrl,
            disableButton:false,
            captcha:"",
        }
    },

    methods:{

        newDepartment(department){
            console.log("department ",department);
            this.department=department;
        },

        /*verifyCaptcha(captcha){
            this.captcha=captcha;
        },

        onCaptchaError(err){
            console.log("error captcha ", err)
            toastr.error("error en la validación del captcha, comprueba tu conexión a internet e intenta nuevamente")
        },

        onCaptchaExpired(err){
            console.log("error captcha ", err)
            toastr.error("el captcha se expiró, intente nuevamente")
        },*/

        getFullRound(){
            if(!this.offer) return "consult-card-full-rounded";
            else return "col-lg-5 col-xl-5 col-12";
        },
        sendMail(){

            let fd= new FormData();

            if(this.fullName&&this.fullName!="") fd.append("fullName", this.fullName);
            else return toastr.error("Rellene todos los campos");
            
            if(this.email&&this.email!="") fd.append("email", this.email);
            else return toastr.error("Rellene todos los campos");
            
            if(this.phone&&this.phone!="") fd.append("phone", this.phone);
            else return toastr.error("Rellene todos los campos");

            if(this.department&&this.department!="") fd.append("department", this.department);
            else return toastr.error("Rellene todos los campos");

            if(this.message&&this.message!="") fd.append("message", this.message);

            fd.append("type", "general")

            //if(this.captcha&&this.captcha!="") fd.append("g-recaptcha-response", this.captcha);
            //else return toastr.error("Complete la prueba de captcha");

            this.disableButton= true;

            let loader = this.$loading.show();

            axios.post(baseUrl+"/api/mail/contact", fd)
            .then(res=>{
                console.log("server response ",res);
                toastr.success("Datos enviados exitosamente");
            }).catch(err=>{
                console.log("server error ",err.response);
                toastr.error("Error al enviar los datos, intente nuevamente");
            })
            .finally(()=>{
                this.disableButton=false;
                loader.hide()
            });
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
