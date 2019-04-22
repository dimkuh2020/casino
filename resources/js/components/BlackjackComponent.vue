<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container">
                    <div class="row justify-content-center">
                        Тут будет стол
                                                
                    </div>
                </div>
                    <br>
                    <br>
            
                <div class="container" v-show="visible">
                    <div class="row justify-content-center">
                        <div>
                            <p>Make your bet:</p>
                            <input type="number" name="bet" style="width:100px;"><br>
                            <input type="button" class="btn btn-danger" name="go" value="GO" style="width: 100px; margin-top: 10px;">
                        </div>
                    </div>
                </div>
            
            
            
                    <br>
                    <br>
            
                <div class="container" v-show="visible" >
                    <div class="row justify-content-center" style="padding-left: 8%;">
                        <div class="col-sm">
                            <input type="button" class="btn btn-danger" name="hit" value="hit" style="width: 100px;">
                        </div>
                        <div class="col-sm">
                            <input type="button" class="btn btn-danger" name="stop" value="stop" style="width: 100px;" >
                        </div>
                        <div class="col-sm">
                            <input type="button" class="btn btn-danger" name="double" value="double" style="width: 100px;">
                        </div>
                    </div>
                </div>
            

                <button @click="visible=!visible">{{visible?'Скрыть':'Отобразить'}}</button>
            
                    <br>
                    <br>

                <div class="container" v-show="visible">
                    <div class="row justify-content-center" style="padding-left: 10%; padding-right: 10%; margin-left:10%">
                        <div class="col">
                            <input type="button" class="btn btn-danger" name="hit" value="hit" style="width: 100px;">
                        </div>
                        <div class="col">
                            <input type="button" class="btn btn-danger" name="stop" value="stop" style="width: 100px;" >
                        </div>                        
                    </div>
                </div>
                    <br>
                    <br>

                <table class="table">
                    <tbody>
                        <tr v-for="dat in data.cards">                            
                            <td>{{dat.title}}</td>
                            <td>{{dat.url}}</td>
                            <td>{{dat.numb}}</td>
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
            return {visible: true}
        }, 

        props: [
            'data'
        ],

        methods: {
            change() {
                this.visible=false;
                alert("fuuuu");
            }
        },        
        
       

        mounted() {
            console.log('Component mounted.')
        }

    }
</script>
