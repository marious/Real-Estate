<template>
    <div>
        <div class="half-circle-spinner" v-if="isLoading">
            <div class="circle circle-1"></div>
            <div class="circle circle-2"></div>
        </div>
        <div
            v-if="show_empty_string && !isLoading && !data.length"
            class="col-12 text-center"
        >
            <span>لا يوجد وحدات لعرضها</span>
        </div>
       <div>
           <div class="row portfolio-items" v-if="!isLoading && data.length">
               <div  v-for="item in data"
                     :key="item.id"
                      class="item col-lg-4 col-md-6 col-xs-12">
                   <div class="project-single">
                       <div class="project-inner project-head">
                           <div class="homes">
                               <!-- homes img -->
                               <a :href="item.url" class="homes-img" :title="item.name">
                                   <div class="homes-tag button alt featured">مميزة</div>
                                   <div class="homes-tag button alt sale">{{ type == 'sale' ? 'للبيع': 'للإيجار' }}</div>
                                   <div class="homes-price">{{ item.price }}</div>
                                   <img :src="item.image" :alt="item.name" class="img-responsive">
                               </a>
                           </div>
                           <div class="button-effect">
                               <a :href="item.url" class="btn"><i class="fa fa-link"></i></a>
                               <a href="https://www.youtube.com/watch?v=14semTlwyUY" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                               <a :href="item.url" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                           </div>
                       </div>
                       <!-- homes content -->
                       <div class="homes-content">
                           <!-- homes address -->
                           <h3><a :href="item.url" :title="item.name">{{ item.name }}</a></h3>
                           <p class="homes-address mb-3">
                               <a :href="item.url" :title="item.name">
                                   <i class="fa fa-map-marker"></i><span>{{ item.location }}</span>
                               </a>
                           </p>
                           <!-- homes List -->
                           <ul class="homes-list clearfix">
                               <li v-if="item.number_bedroom">
                                   <i class="fa fa-bed"></i>
                                   <span> {{ item.number_bedroom }} غرف نوم</span>
                               </li>
                               <li v-if="item.number_bathroom">
                                   <i class="fa fa-bath"></i>
                                   <span> {{ item.number_bathroom }} حمام</span>
                               </li>
                               <li v-if="item.square">
                                   <i class="fa fa-object-group"></i>
                                   <span> {{ item.square }} متر</span>
                               </li>
                           </ul>

                       </div>
                   </div>
               </div>
           </div>
           <div class="bg-all" v-if="data.length && seeMore">
               <a href="properties" class="btn btn-outline-light" title="المزيد">مشاهدة المزيد</a>
           </div>
       </div>
    </div>
</template>
<script>
export default {
    data: function() {
        return {
            isLoading: true,
            data: []
        };
    },

    mounted() {
        this.getProperties();
    },

    props: {
        url: {
            type: String,
            default: () => null,
            required: true
        },
        type: {
            type: String,
            default: () => "rent"
        },
        seeMore: {
            type: Boolean,
            // default: () => true,
        },
        property_id: {
            type: String,
            default: () => null
        },
        project_id: {
            type: String,
            default: () => null
        },
        show_empty_string: {
            type: Boolean,
            default: () => false
        }
    },

    methods: {
        getProperties() {
            this.data = [];
            this.isLoading = true;
            let url = this.url + "?type=" + this.type;

            if (this.property_id) {
                url += "&property_id=" + this.property_id;
            }

            if (this.project_id) {
                url += "&project_id=" + this.project_id;
            }

            axios.get(url).then(res => {
                this.data = res.data.data;
                this.isLoading = false;
            });
        }
    }
};
</script>
