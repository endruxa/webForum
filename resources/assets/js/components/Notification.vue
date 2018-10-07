<template>
   <li class="dropdown" id="markasread">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
           <span class="glyphicon glyphicon-globe"></span>Notifications
           <span class="badge">{{unreadNotifications.length}}</span>
       </a>

       <ul class="dropdown-menu" role="menu">
           <li>
               <notification-item v-for="unread in unreadNotifications" :unread="unread" :key="unread.id"></notification-item>
           </li>
       </ul>
   </li>

</template>

<script>
    export default {
        props:['unreads', 'userId'],
        data(){
            return{
                unreadNotifications: this.unreads
            }
        },
        mounted() {
            console.log('Component mounted.');
            Echo.private('App.User.' + this.userId)
                .notification((notification) => {
                    console.log(notification);
                    let newunreadNotifications = {data:{thread:notification.thread, user:notification.user}};
                    this.unreadNotifications.push(newunreadNotifications);
                });
        }
    }
</script>
