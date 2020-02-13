<template>
    <div class="container-fluid">
        <div class="row justify-content-center py-1">
            <div class="col-12 col-sm-10">
                <div class="card card-info" id="detailedOffer">
                    <a class="card-header collapsed" @click="active=!active" data-parent="#detailedOffer" href="#collapseOne" aria-expanded="false" data-toggle="collapse">
                        <h3 class="card-title text-wrap col-10">Detalles de Oferta</h3>
                        <div class="card-tools">
                        <button type="button" class="btn btn-tool ml-auto " >
                            <personal-fab :active="active" />
                        </button>
                        </div>
                    </a>

                    <div id="collapseOne" class="panel-collapse collapse show" >
                        <div class="card-body d-flex flex-column box-profile">

                            <img class="align-self-center img-fluid" :src="baseUrl+'/'+offer.company_logo" alt="Offer picture" style="max-height: 300px;">

                            <h2 class="profile-username text-center">{{offer.service_name}}</h2>

                            <h3 class="profile-username text-center">{{offer.company_name}}</h3>

                            <p class="text-muted text-center">{{offer.benefits}}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li v-if="offer.highlighted&&offer.highlighted_expiration" class="list-group-item">
                                <b>Expiración en "Destacadas"</b> <a class="float-right">{{offer.highlighted_expiration}}</a>
                                </li>

                                <li class="list-group-item">
                                <b>Tarifa</b> <a class="float-right">{{offer.tariff}}</a>
                                </li>
                                <li class="list-group-item">
                                <b>Departamento</b> <a class="float-right">{{offer.department_name?offer.department_name:"Disponible para todos"}}</a>
                                </li>
                                <li class="list-group-item">
                                <b>Municipio</b> <a class="float-right">{{offer.municipality_name?offer.municipality_name:"Disponible para todos"}}</a>
                                </li>
                            </ul>
                            <br>
                            <ul class="list-group list-group-unbordered mb-3 mt-3">
                                <li class="list-group-item" v-for="(field,index) in offer.fields_values">
                                <b class="text-capitalize">{{field.field_name}}</b> <a class="float-right">{{field.value+(field.unit?(" ("+field.unit+")"):"")}}</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    props:["offer"],

    data(){
        return {
            baseUrl:baseUrl,
            active:true,
        }
    }
    
}
</script>