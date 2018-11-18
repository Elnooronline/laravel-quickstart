<template>
    <!-- Tasks: style can be found in dropdown.less -->
    <li class="dropdown tasks-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-danger" v-if="notifications.count">
                {{ notifications.count }}
            </span>
        </a>
        <ul class="dropdown-menu">
            <li class="header" v-if="notifications.count">{{ $t('notifications.plural') }}</li>
            <li class="header" v-if="! notifications.count">{{ $t('notifications.empty') }}</li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    <li v-for="notification in notifications.data">
                        <!-- Task item -->
                        <a :href="notification.dashboard_url">
                            <h3>
                                {{ notification.message }}
                                <br>
                                <br>
                                <small class="pull-right">{{ notification.formated_date }}</small>
                            </h3>
                        </a>
                    </li>
                    <!-- end task item -->
                </ul>
            </li>
            <li class="footer">
                <a :href="notifications.link">
                    {{ $t('notifications.all') }}
                </a>
            </li>
        </ul>
    </li>
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
    created() {
      axios.get(this.route).then((response) => {
        this.notifications = response.data;
      });
    }
  }
</script>
