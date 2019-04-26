<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container" v-show="!visible1" style="height: 222px;">
                    <div class="container">
                        <div class="row justify-content-center">
                            <h4>dealer (21)</h4>
                        </div>
                        <div class="row justify-content-center">
                            <div v-for="dealercard in dealercards">
                                <img style="height: 80px; width:66px; margin-left: 5px;" v-bind:src="dealercard.url">
                            </div>
                        </div> 


                    </div>
                    <div class="container" style="padding-top: 100px;">
                        <div class="row justify-content-center">
                            <div v-for="usercard in usercards">
                                <img style="height: 80px; width:66px; margin-left: 5px;" v-bind:src="usercard.url">
                            </div>
                        </div>
                        <div <div class="row justify-content-center" style="padding-top: 10px;">
                            <h4>{{user}} (21)</h4>                                                       
                        </div>                                              
                    </div>                       
                </div>                
                    <br>
                    <br>
            
                <div class="container" v-show="visible1">
                    <div class="row justify-content-center">
                        <div>
                            <p>Make your bet:</p>
                            <input type="number" name="bet" style="width:100px;"><br>
                            <input type="button" @click="visible1=!visible1" class="btn btn-danger" name="go" value="GO" style="width: 100px; margin-top: 10px;">
                        </div>
                    </div>
                </div>  
                    <br>
                    <br>
                    <br>

            <!-- Контейнер для вывода второй партии кнопок-->       
                <div v-show="!visible1">  
                    <div class="container" v-show="visible2" >
                        <div class="row justify-content-center" style="padding-left: 8%;">
                            <div class="col-sm">
                                <input type="button" @click="visible2=!visible2" class="btn btn-danger" name="hit" value="hit" style="width: 100px;">
                            </div>
                            <div class="col-sm">
                                <input type="button" @click="visible2=!visible2" class="btn btn-danger" name="stop" value="stop" style="width: 100px;" >
                            </div>
                            <div class="col-sm">
                                <input type="button" @click="visible2=!visible2" class="btn btn-danger" name="double" value="double" style="width: 100px;">
                            </div>
                        </div>
                    </div> 
                    <div class="container" v-show="!visible2">
                        <div class="row justify-content-center" style="padding-left: 10%; padding-right: 10%; margin-left:10%">
                            <div class="col">
                                <input type="button" class="btn btn-danger" name="hit" value="hit" style="width: 100px;">
                            </div>
                            <div class="col">
                                <input type="button" class="btn btn-danger" name="stop" value="stop" style="width: 100px;" >
                            </div>                        
                        </div>
                    </div>
                </div>
                    <br>
                    <br>                
                <table class="table">
                    <tbody>
                        <tr v-for="card in cards">                            
                            <td>{{card.title}}</td>
                            <td><img style="height: 80px; width:66px" v-bind:src="card.url"></td>
                            <td>{{card.value}}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                visible1: true,
                visible2: true
            }
            
        }, 

        props: [
            'cards',
            'user',
            'usercards',
            'dealercards'
        ],

        methods: {
            change() {                
                alert("fuuuu");
            }
        },        
        
       

        mounted() {
            console.log('Component mounted.')
        }

    }
</script>
