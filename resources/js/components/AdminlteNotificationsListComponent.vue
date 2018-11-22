<template>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title" v-if="notifications.count">{{ $t('notifications.plural') }}</h3>
            <h3 class="box-title" v-if="! notifications.count">{{ $t('notifications.empty') }}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <ul class="products-list product-list-in-box">
                <li class="item" v-for="notification in notifications.data">
                    <div class="product-info">
                        <a :href="notification.dashboard_url" class="product-title">
                            {{ notification.message }}
                            <span class="pull-right">{{ notification.formated_date }}</span>
                        </a>
                    </div>
                </li>
                <!-- /.item -->
                <li class="footer"
                    v-if="optional(notifications.links).prev || optional(notifications.links).next">
                    <br>
                    <nav>
                        <ul class="pager">
                            <li v-if="optional(notifications.links).prev">
                                <a @click.prevent="paginate(optional(notifications.links).prev)">
                                    {{ $t('pagination.previous') }}
                                </a>
                            </li>
                            <li v-if="optional(notifications.links).next">
                                <a @click.prevent="paginate(optional(notifications.links).next)">
                                    {{ $t('pagination.next') }}
                                </a>
                            </li>
                        </ul>
                    </nav>
                </li>
            </ul>
        </div>
        <!-- /.box-body -->
    </div>
</template>

<script>
    export default {
        props: {
          route: {
            type: String,
            required: true,
          }
        },
        data() {
            return {
                notifications: [],
            }
        },
        methods:{
            paginate: function (url) {
                axios.get(url).then((response) => {
                    this.notifications = response.data;
                });
            },
          optional: function (data) {
            return data || {};
          }
        },
        created() {
            axios.get(this.route).then((response) => {
                this.notifications = response.data;
            });
        }
    }
</script>
