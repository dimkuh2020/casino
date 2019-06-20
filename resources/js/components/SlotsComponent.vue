<template>
    <div class="container">
        <button @click="test()">TEST</button>
        <button @click="test2()">TEST2</button>
        <div id="divtest">
            <img id="imgtest" src="img/slots/reel3.png">            
        </div>
        <div class="row justify-content-center">
            <div>
                <table>
                    <tr>
                        <td>
                            <div id="divtest">
                                <img v-bind:src="slotmachine[0][0].url" v-show="visible1">
                                <img id="imgtest1" src="img/slots/reel3.png" v-show="!visible1">            
                            </div>
                        </td>
                        <td>
                            <div id="divtest">
                                <img v-bind:src="slotmachine[0][1].url" v-show="visible1">
                                <img id="imgtest11" src="img/slots/reel3.png" v-show="!visible1">            
                            </div>
                        </td>
                        <td>
                            <div id="divtest">
                                <img v-bind:src="slotmachine[0][2].url" v-show="visible1">
                                <img id="imgtest111" src="img/slots/reel3.png" v-show="!visible1">            
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div id="divtest">
                                <img v-bind:src="slotmachine[1][0].url" v-show="visible1">
                                <img id="imgtest2" src="img/slots/reel3.png" v-show="!visible1">            
                            </div>
                        </td>
                        <td>
                            <div id="divtest">
                                <img v-bind:src="slotmachine[1][1].url" v-show="visible1">
                                <img id="imgtest22" src="img/slots/reel3.png" v-show="!visible1">            
                            </div>
                        </td>
                        <td>
                            <div id="divtest">
                                <img v-bind:src="slotmachine[1][2].url" v-show="visible1">
                                <img id="imgtest222" src="img/slots/reel3.png" v-show="!visible1">            
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div id="divtest">
                                <img v-bind:src="slotmachine[2][0].url" v-show="visible1">
                                <img id="imgtest3" src="img/slots/reel3.png" v-show="!visible1">            
                            </div>
                        </td>
                        <td>
                            <div id="divtest">
                                <img v-bind:src="slotmachine[2][1].url" v-show="visible1">
                                <img id="imgtest33" src="img/slots/reel3.png" v-show="!visible1">            
                            </div>
                        </td>
                        <td>
                            <div id="divtest">
                                <img v-bind:src="slotmachine[2][2].url" v-show="visible1">
                                <img id="imgtest333" src="img/slots/reel3.png" v-show="!visible1">            
                            </div>
                        </td>
                    </tr>               
                </table>
            </div> 

            
            <div>
                <table>
                    <tr>
                        <td v-for="sm in slotmachine[0]"> 
                            <img class="slots" id="l1" v-bind:src="sm.url" v-model="slotmachine[0]">
                        </td>
                    </tr>
                     <tr>
                        <td v-for="sm in slotmachine[1]"> 
                            <img class="slots" id="l2" v-bind:src="sm.url" v-model="slotmachine[1]">
                        </td>
                    </tr>
                    <tr>
                        <td v-for="sm in slotmachine[2]"> 
                            <img class="slots" id="l3" v-bind:src="sm.url" v-model="slotmachine[2]">
                        </td>
                      </tr>                    
                </table>
            </div>            
            <!--<div  class="container" style="text-align: center; padding-top: 2%; color: #1b1f3d;">
                    <h3>{{message}}{{bet}}{{char}}</h3>                                                                           
            </div>--> 
            <div class="container" style="text-align: center; padding-top: 2%">                
                <output><h4>Bet:</h4><p class="underbox">{{bet}} $</p></output>
                <output style="margin-left:5%"><h4>Cash:</h4><p class="underbox">{{cash}} $</p></output>
                <output style="margin-left:5%"><h4>Wins:</h4><p class="underbox">{{wins}} $</p></output>                
            </div> 
            <div class="container" style="text-align: center; padding-top: 2%">                
                <input type="button" @click="spin(10)" class="btn btn-info" name="bet10" value="10" style="width: 120px;">
                <input type="button" @click="spin(50)" class="btn btn-warning" name="bet50" value="50" style="width: 120px; margin-left:5%">
                <input type="button" @click="spin(100)" class="btn btn-danger" name="bet100" value="100" style="width: 120px; margin-left:5%">
            </div> 
        </div>
    </div>
</template>

<style type="text/css">

    #imgtest1, #imgtest11, #imgtest111,
    #imgtest2, #imgtest22, #imgtest222,
    #imgtest3, #imgtest33, #imgtest333 {    
    position: relative; /*установить колесо внизу div*/
    bottom: 1700px;         
    
    
    /*transform: translate(0,1700px);*/
    
    transition-duration: 1s;  
    
    transition-timing-function: cubic-bezier(0,0,1,1);

        
    }
    #divtest{
        width: 100px;
        height: 100px;
        overflow: hidden; 
        
    }

    table {
        width: 300px;
        height: 300px;
        border: solid 3px blue;

    }

    tr {
            height: 100px;

    }

    td {        
        width: 100px;
        border: solid 2px blue;
        border-bottom:0;
        border-top: 0;        
    }

    td:nth-child(1){
        color: red;

    }

    

    .underbox{
        justify-content: center;
        align-items: center;
        border: 4px groove orangered; 
        border-radius: 30%;
        text-align: center;  
        font-size: 22px;         
        height: 50px;
        width: 120px;        
        color: #1b1f3d;
    }    
</style>

<script>
    export default {

        props: [
            'slots',
            'user',
            'cash',
            'id',
        ],

         data() {
            return {
                visible1: true,
                visible2: true, 
                visible3: true,
                bet: 0,                    //ставка 0 
                tempindex: null,
                line1: 0,                  //для суммиования выигрыша
                line2: 0,
                line3: 0,
                line4: 0,
                line5: 0,  
                wins: 0,   
                slotmachine: [[],[],[]]      //пустой 2мерный массив для машины                
            }
        },  

        methods:{

            test2(){
                this.visible1 = false;
            },

            test(){

                this.visible1 = false;

                setTimeout( function(){                    
                    document.getElementById('imgtest1').style.transform="translate(0px, 1700px)";                    
                }, 1);

                setTimeout( function(){
                    document.getElementById('imgtest2').style.transform="translate(0px, 1700px)";
                }, 10);

                setTimeout( function(){
                    document.getElementById('imgtest3').style.transform="translate(0px, 1700px)";
                }, 20); 

                setTimeout( function(){
                    document.getElementById('imgtest11').style.transform="translate(0px, 1700px)";
                }, 30);

                setTimeout( function(){
                    document.getElementById('imgtest22').style.transform="translate(0px, 1700px)";
                }, 40);

                setTimeout( function(){
                    document.getElementById('imgtest33').style.transform="translate(0px, 1700px)";
                }, 50); 

                setTimeout( function(){
                    document.getElementById('imgtest111').style.transform="translate(0px, 1700px)";
                }, 60);

                setTimeout( function(){
                    document.getElementById('imgtest222').style.transform="translate(0px, 1700px)";
                }, 70);

                setTimeout( function(){
                    document.getElementById('imgtest333').style.transform="translate(0px, 1700px)";
                }, 80); 


                              
            },

            spin(bet){                
                this.bet = bet;  
                this.wins = this.line1 = this.line2 = this.line3 = this.line4 = this.line5 = 0; 

                if(this.bet > this.cash){
                    Swal.fire({
                          title: 'Not enough cash!',                        
                          confirmButtonColor: '#3490dc' 
                    })
                }
                else{
                    this.slotmachine = [[],[],[]];
                    this.getslots(); 
                    this.cash -= this.bet;                                                           

                    if((this.slotmachine[0][0].title == 'cherry')&&(this.slotmachine[0][1].title == 'cherry')){
                        this.line1 = this.bet*2;
                    }
                    if((this.slotmachine[0][0].title == 'cherry')&&(this.slotmachine[0][1].title == 'cherry')&&(this.slotmachine[0][2].title == 'cherry')){
                        this.line1 = this.bet*14;
                    }                

                    if((this.slotmachine[1][0].title == 'cherry')&&(this.slotmachine[1][1].title == 'cherry')){
                        this.line2 = this.bet*2;
                    }
                    if((this.slotmachine[1][0].title == 'cherry')&&(this.slotmachine[1][1].title == 'cherry')&&(this.slotmachine[1][2].title == 'cherry')){
                        this.line2 = this.bet*14;
                    }

                    if((this.slotmachine[2][0].title == 'cherry')&&(this.slotmachine[2][1].title == 'cherry')){
                        this.line3 = this.bet*2;
                    }
                    if((this.slotmachine[2][0].title == 'cherry')&&(this.slotmachine[2][1].title == 'cherry')&&(this.slotmachine[2][2].title == 'cherry')){
                        this.line3 = this.bet*14;
                    }

                    if((this.slotmachine[0][0].title == 'cherry')&&(this.slotmachine[1][1].title == 'cherry')){
                        this.line4 = this.bet*2;
                    }
                    if((this.slotmachine[0][0].title == 'cherry')&&(this.slotmachine[1][1].title == 'cherry')&&(this.slotmachine[2][2].title == 'cherry')){
                        this.line4 = this.bet*14;
                    }

                    if((this.slotmachine[2][0].title == 'cherry')&&(this.slotmachine[1][1].title == 'cherry')){
                        this.line5 = this.bet*2;
                    }
                    if((this.slotmachine[2][0].title == 'cherry')&&(this.slotmachine[1][1].title == 'cherry')&&(this.slotmachine[0][2].title == 'cherry')){
                        this.line5 = this.bet*14;
                    }
                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    if((this.slotmachine[0][0].title == 'orange')&&(this.slotmachine[0][1].title == 'orange')){
                        this.line1 = this.bet*3;
                    }
                    if((this.slotmachine[0][0].title == 'orange')&&(this.slotmachine[0][1].title == 'orange')&&(this.slotmachine[0][2].title == 'orange')){
                        this.line1 = this.bet*24;
                    }                

                    if((this.slotmachine[1][0].title == 'orange')&&(this.slotmachine[1][1].title == 'orange')){
                        this.line2 = this.bet*3;
                    }
                    if((this.slotmachine[1][0].title == 'cherry')&&(this.slotmachine[1][1].title == 'orange')&&(this.slotmachine[1][2].title == 'orange')){
                        this.line2 = this.bet*24;
                    }

                    if((this.slotmachine[2][0].title == 'orange')&&(this.slotmachine[2][1].title == 'orange')){
                        this.line3 = this.bet*3;
                    }
                    if((this.slotmachine[2][0].title == 'orange')&&(this.slotmachine[2][1].title == 'orange')&&(this.slotmachine[2][2].title == 'orange')){
                        this.line3 = this.bet*24;
                    }

                    if((this.slotmachine[0][0].title == 'orange')&&(this.slotmachine[1][1].title == 'orange')){
                        this.line4 = this.bet*3;
                    }
                    if((this.slotmachine[0][0].title == 'orange')&&(this.slotmachine[1][1].title == 'orange')&&(this.slotmachine[2][2].title == 'orange')){
                        this.line4 = this.bet*24;
                    }

                    if((this.slotmachine[2][0].title == 'orange')&&(this.slotmachine[1][1].title == 'orange')){
                        this.line5 = this.bet*3;
                    }
                    if((this.slotmachine[2][0].title == 'orange')&&(this.slotmachine[1][1].title == 'orange')&&(this.slotmachine[0][2].title == 'orange')){
                        this.line5 = this.bet*24;
                    }
                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    if((this.slotmachine[0][0].title == 'plum')&&(this.slotmachine[0][1].title == 'plum')&&(this.slotmachine[0][2].title == 'plum')){
                        this.line1 = this.bet*32;
                    }  
                    
                    if((this.slotmachine[1][0].title == 'plum')&&(this.slotmachine[1][1].title == 'plum')&&(this.slotmachine[1][2].title == 'plum')){
                        this.line2 = this.bet*32;
                    }
                    
                    if((this.slotmachine[2][0].title == 'plum')&&(this.slotmachine[2][1].title == 'plum')&&(this.slotmachine[2][2].title == 'plum')){
                        this.line3 = this.bet*32;
                    }
                    
                    if((this.slotmachine[0][0].title == 'plum')&&(this.slotmachine[1][1].title == 'plum')&&(this.slotmachine[2][2].title == 'plum')){
                        this.line4 = this.bet*32;
                    }
                    
                    if((this.slotmachine[2][0].title == 'plum')&&(this.slotmachine[1][1].title == 'plum')&&(this.slotmachine[0][2].title == 'plum')){
                        this.line5 = this.bet*32;
                    }
                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    if((this.slotmachine[0][0].title == 'bell')&&(this.slotmachine[0][1].title == 'bell')&&(this.slotmachine[0][2].title == 'bell')){
                        this.line1 = this.bet*40;
                    }  
                    
                    if((this.slotmachine[1][0].title == 'bell')&&(this.slotmachine[1][1].title == 'bell')&&(this.slotmachine[1][2].title == 'bell')){
                        this.line2 = this.bet*40;
                    }
                    
                    if((this.slotmachine[2][0].title == 'bell')&&(this.slotmachine[2][1].title == 'bell')&&(this.slotmachine[2][2].title == 'bell')){
                        this.line3 = this.bet*40;
                    }
                    
                    if((this.slotmachine[0][0].title == 'bell')&&(this.slotmachine[1][1].title == 'bell')&&(this.slotmachine[2][2].title == 'bell')){
                        this.line4 = this.bet*40;
                    }
                    
                    if((this.slotmachine[2][0].title == 'bell')&&(this.slotmachine[1][1].title == 'bell')&&(this.slotmachine[0][2].title == 'bell')){
                        this.line5 = this.bet*40;
                    }
                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    if((this.slotmachine[0][0].title == 'bar')&&(this.slotmachine[0][1].title == 'bar')&&(this.slotmachine[0][2].title == 'bar')){
                        this.line1 = this.bet*50;
                    }  
                    
                    if((this.slotmachine[1][0].title == 'bar')&&(this.slotmachine[1][1].title == 'bar')&&(this.slotmachine[1][2].title == 'bar')){
                        this.line2 = this.bet*50;
                    }
                    
                    if((this.slotmachine[2][0].title == 'bar')&&(this.slotmachine[2][1].title == 'bar')&&(this.slotmachine[2][2].title == 'bar')){
                        this.line3 = this.bet*50;
                    }
                    
                    if((this.slotmachine[0][0].title == 'bar')&&(this.slotmachine[1][1].title == 'bar')&&(this.slotmachine[2][2].title == 'bar')){
                        this.line4 = this.bet*50;
                    }
                    
                    if((this.slotmachine[2][0].title == 'bar')&&(this.slotmachine[1][1].title == 'bar')&&(this.slotmachine[0][2].title == 'bar')){
                        this.line5 = this.bet*50;
                    }
                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    if((this.slotmachine[0][0].title == 'seven')&&(this.slotmachine[0][1].title == 'seven')&&(this.slotmachine[0][2].title == 'seven')){
                        this.line1 = this.bet*100;
                    }  
                    
                    if((this.slotmachine[1][0].title == 'seven')&&(this.slotmachine[1][1].title == 'seven')&&(this.slotmachine[1][2].title == 'seven')){
                        this.line2 = this.bet*100;
                    }
                    
                    if((this.slotmachine[2][0].title == 'seven')&&(this.slotmachine[2][1].title == 'seven')&&(this.slotmachine[2][2].title == 'seven')){
                        this.line3 = this.bet*100;
                    }
                    
                    if((this.slotmachine[0][0].title == 'seven')&&(this.slotmachine[1][1].title == 'seven')&&(this.slotmachine[2][2].title == 'seven')){
                        this.line4 = this.bet*100;
                    }
                    
                    if((this.slotmachine[2][0].title == 'seven')&&(this.slotmachine[1][1].title == 'seven')&&(this.slotmachine[0][2].title == 'seven')){
                        this.line5 = this.bet*100;
                    }

                    this.wins = this.line1+this.line2+this.line3+this.line4+this.line5;
                    this.cash += this.wins;                               
                    var data = {cash: this.cash};
                    axios.put('/public/updatecash',data).then((response)=>{   
                       console.log(response.data);
                    }).catch((error)=>{
                       console.log(error);
                    }); 

                    console.log('1 - '+ this.line1);  //для проверки
                    console.log('2 - '+ this.line2); 
                    console.log('3 - '+ this.line3); 
                    console.log('4 - '+ this.line4); 
                    console.log('5 - '+ this.line5);  
                    console.log('w - '+ this.wins);

                    }
            },

             getslots(){
                 for(var i=0; i<3; i++) {
                        this.tempindex = Math.floor(Math.random()*this.slots.length); 
                        this.slotmachine[0].push(this.slots[this.tempindex]);  
                    
                        this.tempindex = Math.floor(Math.random()*this.slots.length); 
                        this.slotmachine[1].push(this.slots[this.tempindex]);
                    
                        this.tempindex = Math.floor(Math.random()*this.slots.length); 
                        this.slotmachine[2].push(this.slots[this.tempindex]);
                    }
            }
        },
       
        mounted() {
            console.log('Component mounted.');
            this.getslots(); 
        }
    }
</script>
