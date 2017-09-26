<template>
    <div id="calendar" class="p-3"></div>
</template>

<script>
    
    export default {

        props: [
            'eventsJson'
        ],

        data: () => {
            return {
                calendarEvents: null,             
            }
        },        

        methods: {

            constructCalendar: function() {
                var vm = this;
                $(document).ready(function() {

                    $('#calendar').fullCalendar({

                        header: {
                            left: 'prev,next',
                            center: 'title',
                            right: 'listMonth,month'
                        },

                        handleWindowResize: false,

                        eventRender: function(event, element, view) {
                            $('.fc-list-view .fc-scroller').css('height', 'auto');  // fix list view height bug
                        },

                        defaultView: 'month',

                        events: vm.calendarEvents
                        
                    })
                });
            },

            loadCalendarEvents: function() {
                this.calendarEvents = JSON.parse(this.eventsJson)
            }

        },

        mounted() {

            this.loadCalendarEvents()
            this.constructCalendar()

        }

    }
</script>
