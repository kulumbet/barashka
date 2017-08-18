<template>
    <div id="app">

        <br/>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Загоны</div>

                        <div class="panel-body">

                            <button @click="run">Старт</button>
                            <button @click="stop">Стоп</button>
                            <button @click="reset">Сброс</button>

                            <p>День : {{day}}</p>
                            <p>Все  : {{all}}</p>
                            <p>Загон с макс овцами : {{max}}</p>
                            <p>Загон с мин овцами  : {{min}}</p>

                            <div class="">
                                <table class="">
                                    <thead>
                                    <tr class="">
                                        <td class="" style="width:200px"><p>Номер</p></td>
                                        <td class=""><p>Количество</p></td>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr v-for="item in items.data">
                                        <td class=""><p class="">{{item.id}}</p></td>
                                        <td class=""><p>{{item.sum}}</p></td>

                                    </tr>

                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>

    var running = false;
    var refreshIntervalId = 0;
    var day = 0;
    export default {
        data(){
            return {
                items: [],
                all: 0,
                day: 0,
                max: 0,
                min: 0
            }
        },
        created(){
            this.run();
        },

        methods: {

            run: function () {
                if (running === false) {
                    refreshIntervalId = setInterval(function () {
                        this.addDay(),
                        this.runData(),
                        this.getAll()
                    }.bind(this), 6000);
                    running = true;
                } else {
                    alert("already running!");
                }
            },
            runData: function () {
                axios.post('/api/v1/run', {
                    headers: {
                        'Content-type': 'application/json'
                    }
                }).then(response => {
                    this.items = response,
                    console.log(this.items)
                });

            },
            addDay: function () {
                axios.get('/api/v1/add-day', {
                    headers: {
                        'Content-type': 'application/json'
                    }
                }).then(response => {
                    this.day = response.data,
                    console.log(this.day)
                });

            },
            stop: function () {
                if (running === true) {
                    axios.post('/api/v1/stop', {
                        headers: {
                            'Content-type': 'application/json'
                        }
                    }).then(response => {
                        this.items = response,
                        clearInterval(refreshIntervalId),
                        this.getAll(),
                        this.getMax(),
                        this.getMin(),
                        running = false
                    });
                } else {
                    alert("already stopped!");
                }
            },
            getAll: function () {
                axios.get('/api/v1/get-all', {
                    headers: {
                        'Content-type': 'application/json'
                    }
                }).then(response => {
                    this.all = response.data
                });
            },
            getMax: function () {
                axios.get('/api/v1/get-max', {
                    headers: {
                        'Content-type': 'application/json'
                    }
                }).then(response => {
                    this.max = response.data
                });
            },
            getMin: function () {
                axios.get('/api/v1/get-min', {
                    headers: {
                        'Content-type': 'application/json'
                    }
                }).then(response => {
                    this.min = response.data
                });
            },
            reset: function () {
                axios.post('/api/v1/reset', {
                    headers: {
                        'Content-type': 'application/json'
                    }
                }).then(response => {
                    this.items = response,
                    this.day = 0,
                    this.all = 0
                });
            },

        },
        mounted() {
            //this.loadData();

//            this.interval = setInterval(function () {
//
//                console.log("..");
//                this.loadData();
//            }.bind(this), 10000);
        },

    }
</script>
