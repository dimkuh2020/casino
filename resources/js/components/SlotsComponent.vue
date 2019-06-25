<template>
<<<<<<< HEAD
    <div class="container">
        <button @click="test()">TEST</button>
        <button @click="test1()">TEST1</button>
        <button @click="test2()">TEST2</button>
        <button @click="test3()">TEST3</button>
        <div id="divtest">
            <img id="imgtest" src="img/slots/reel3.png">            
        </div>
=======
    <div class="container">        
>>>>>>> 4b9cded80c108d28afa1fd0b4270ae65fac6a3a2
        <div class="row justify-content-center">
            <div id="t">
                <table>
                    <tr>
                        <td>
                            <div id="do">
                                <img id="slot1" v-bind:src="slotmachine[0][0].url">
                                <img id="reel1" src="img/slots/reel3.png">
                            </div>
                        </td>
                        <td>
                            <div id="do">
                                <img id="slot11" v-bind:src="slotmachine[0][1].url">
                                <img id="reel11" src="img/slots/reel3.png">            
                            </div>
                        </td>
                        <td>
                            <div id="do">
                                <img id="slot111" v-bind:src="slotmachine[0][2].url">
                                <img id="reel111" src="img/slots/reel3.png">            
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div id="do">
                                <img id="slot2" v-bind:src="slotmachine[1][0].url">
                                <img id="reel2" src="img/slots/reel3.png">            
                            </div>
                        </td>
                        <td>
                            <div id="do">
                                <img id="slot22" v-bind:src="slotmachine[1][1].url">
                                <img id="reel22" src="img/slots/reel3.png">            
                            </div>
                        </td>
                        <td>
                            <div id="do">
                                <img id="slot222" v-bind:src="slotmachine[1][2].url">
                                <img id="reel222" src="img/slots/reel3.png">            
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div id="do">
                                <img id="slot3"v-bind:src="slotmachine[2][0].url">
                                <img id="reel3" src="img/slots/reel3.png">            
                            </div>
                        </td>
                        <td>
                            <div id="do">
                                <img id="slot33" v-bind:src="slotmachine[2][1].url">
                                <img id="reel33" src="img/slots/reel3.png">            
                            </div>
                        </td>
                        <td>
                            <div id="do">
                                <img id="slot333" v-bind:src="slotmachine[2][2].url">
                                <img id="reel333" src="img/slots/reel3.png">
                            </div>
                        </td>
                    </tr>               
                </table>
            </div>            
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
            <div id="rules">
                <img src="img/slots/rules.png">
            </div> 
        </div>
    </div>
</template>

<style type="text/css">
    table {
            width: 300px;
            height: 300px;
            border: solid 10px gold;            
    }

    tr {
        height: 100px;
        border: solid 2px gold;
    }

    td {        
        width: 100px;
        border: solid 2px gold;
        border-bottom:0;
        border-top: 0;        
    }

    #rules{
        margin-top: 3%;
        border-radius: 2px;
        border: solid blue;
       
    }

    #reel1, #reel11, #reel111,
    #reel2, #reel22, #reel222,
    #reel3, #reel33, #reel333 {    
        position: relative; /*установить колесо внизу div*/
        bottom: 1700px;  
        transition-duration: 1s;
        transition-timing-function: cubic-bezier(0,0,1,1); /*равномерная анимация*/
        display: none;        
    }

    #slot1, #slot2, #slot3,
    #slot11, #slot22, #slot33,
    #slot111, #slot222, #slot333 {
        display: block;
    }

    #do{
        width: 100px;
        height: 100px;
        overflow: hidden;
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
            animation(){                    //анимация прокрутки
            this.cash -= this.bet;         //сразу отнимаем ставку от баланса     
                document.getElementById('reel1').style.display="block";
                document.getElementById('reel2').style.display="block";
                document.getElementById('reel3').style.display="block";
                document.getElementById('reel11').style.display="block";
                document.getElementById('reel22').style.display="block";
                document.getElementById('reel33').style.display="block";
                document.getElementById('reel111').style.display="block";
                document.getElementById('reel222').style.display="block";
                document.getElementById('reel333').style.display="block";

                setTimeout( function(){                    
                    document.getElementById('reel1').style.transform="translate(0px, 1700px)";                    
                }, 20);

<<<<<<< HEAD
            test3(){
                this.visible = false;
                setTimeout( function(){
                    document.getElementById('reel1').style.transform="translate(0px, 1700px)";                                        
                    
                }, 10);

                setTimeout( function(){
                    document.getElementById('reel2').style.transform="translate(0px, 1700px)";
                    
                }, 20);

                setTimeout( function(){
                    document.getElementById('reel3').style.transform="translate(0px, 1700px)";
                    
                }, 30); 

                setTimeout( function(){
                    document.getElementById('reel11').style.transform="translate(0px, 1700px)";
                    
                }, 40);

                setTimeout( function(){
                    document.getElementById('reel22').style.transform="translate(0px, 1700px)";
                    
                }, 50);

                setTimeout( function(){
                    document.getElementById('reel33').style.transform="translate(0px, 1700px)";
                    
                }, 60); 

                setTimeout( function(){
                    document.getElementById('reel111').style.transform="translate(0px, 1700px)";
                    
                }, 70);

                setTimeout( function(){
                    document.getElementById('reel222').style.transform="translate(0px, 1700px)";
                    
                }, 80);

                setTimeout( function(){
                    document.getElementById('reel333').style.transform="translate(0px, 1700px)";
                    
                }, 90);   
                

            },

            test2(){
                this.visible = false;
=======
>>>>>>> 4b9cded80c108d28afa1fd0b4270ae65fac6a3a2
                setTimeout( function(){
                    document.getElementById('reel2').style.transform="translate(0px, 1700px)";                    
                }, 30);

                setTimeout( function(){
                    document.getElementById('reel3').style.transform="translate(0px, 1700px)";                    
                }, 40); 

                setTimeout( function(){
                    document.getElementById('reel11').style.transform="translate(0px, 1700px)";                   
                }, 50);

                setTimeout( function(){
                    document.getElementById('reel22').style.transform="translate(0px, 1700px)";                    
                }, 60);

                setTimeout( function(){
                    document.getElementById('reel33').style.transform="translate(0px, 1700px)";                    
                }, 70); 

                setTimeout( function(){
                    document.getElementById('reel111').style.transform="translate(0px, 1700px)";                    
                }, 80);

                setTimeout( function(){
                    document.getElementById('reel222').style.transform="translate(0px, 1700px)";                    
                }, 90);

                setTimeout( function(){
                    document.getElementById('reel333').style.transform="translate(0px, 1700px)";                    
                }, 100); 

                setTimeout( function(){
                    document.getElementById('reel1').style.transform="translate(0px, -1700px)";
                    document.getElementById('reel2').style.transform="translate(0px, -1700px)";
                    document.getElementById('reel3').style.transform="translate(0px, -1700px)";
                    document.getElementById('reel11').style.transform="translate(0px, -1700px)";
                    document.getElementById('reel22').style.transform="translate(0px, -1700px)";
                    document.getElementById('reel33').style.transform="translate(0px, -1700px)";
                    document.getElementById('reel111').style.transform="translate(0px, -1700px)";
                    document.getElementById('reel222').style.transform="translate(0px, -1700px)";
                    document.getElementById('reel333').style.transform="translate(0px, -1700px)";

                    document.getElementById('reel1').style.display="none";
                    document.getElementById('reel2').style.display="none";
                    document.getElementById('reel3').style.display="none";
                    document.getElementById('reel11').style.display="none";
                    document.getElementById('reel22').style.display="none";
                    document.getElementById('reel33').style.display="none";
                    document.getElementById('reel111').style.display="none";
                    document.getElementById('reel222').style.display="none";
                    document.getElementById('reel333').style.display="none";
                }, 1000);                              
            },

            spin(bet){                                             // прокрутка + резкльтат
                this.bet = bet;                
                if(this.bet > this.cash){
                    Swal.fire({
                          title: 'Not enough cash!',                        
                          confirmButtonColor: '#3490dc' 
                    })
                }
                else{                    
                    setTimeout(() => this.animation(), 10);
                    setTimeout(() => this.getslots(), 1000);  
                }
            },

             getfirstslots(){                                                                                   //получить рандомные слоты вначале
                 for(var i=0; i<3; i++) {
                    this.tempindex = Math.floor(Math.random()*this.slots.length); 
                    this.slotmachine[0].push(this.slots[this.tempindex]);  
                
<<<<<<< HEAD
                this.visible = false;

                setTimeout( function(){
                    document.getElementById('reel1').style.transform="translate(0px, 1700px)";
                    setTimeout( function(){
                        //document.getElementById('reel1').style.visibility="hidden";
                        document.getElementById('slot1').style.display="block";
                    }, 500);
                }, 10);

                setTimeout( function(){
                    document.getElementById('reel2').style.transform="translate(0px, 1700px)";
                    setTimeout( function(){
                        //document.getElementById('reel2').style.display="none";
                        document.getElementById('slot2').style.display="block";
                    }, 500);
                }, 20);

                setTimeout( function(){
                    document.getElementById('reel3').style.transform="translate(0px, 1700px)";
                    setTimeout( function(){
                        //document.getElementById('reel3').style.display="none";
                        document.getElementById('slot3').style.display="block";
                    }, 500);
                }, 30); 

                setTimeout( function(){
                    document.getElementById('reel11').style.transform="translate(0px, 1700px)";
                    setTimeout( function(){
                        //document.getElementById('reel11').style.display="none";
                        document.getElementById('slot11').style.display="block";
                    }, 500);
                }, 40);
=======
                    this.tempindex = Math.floor(Math.random()*this.slots.length); 
                    this.slotmachine[1].push(this.slots[this.tempindex]);
                
                    this.tempindex = Math.floor(Math.random()*this.slots.length); 
                    this.slotmachine[2].push(this.slots[this.tempindex]);
                }
            }, 
>>>>>>> 4b9cded80c108d28afa1fd0b4270ae65fac6a3a2

            getslots(){                                                                                         // ф-ция для запуска
                this.slotmachine = [[],[],[]];                
                this.wins = this.line1 = this.line2 = this.line3 = this.line4 = this.line5 = 0; 
                                                                                
                for(var i=0; i<3; i++) {
                    this.tempindex = Math.floor(Math.random()*this.slots.length); 
                    this.slotmachine[0].push(this.slots[this.tempindex]);  
                
                    this.tempindex = Math.floor(Math.random()*this.slots.length); 
                    this.slotmachine[1].push(this.slots[this.tempindex]);
                
                    this.tempindex = Math.floor(Math.random()*this.slots.length); 
                    this.slotmachine[2].push(this.slots[this.tempindex]);
                }
                //логика:
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
<<<<<<< HEAD
                else{
                    
                    this.slotmachine = [[],[],[]];
                    this.getslots(); 
                    this.cash -= this.bet;


                    //this.test();    //поменять название ф-ции


                    this.test2();   //нужен callback


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
=======
>>>>>>> 4b9cded80c108d28afa1fd0b4270ae65fac6a3a2

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
       
        mounted() {
            console.log('Component mounted.');
            this.getfirstslots();                   //рандомные слоты в начале
        }
    }
</script>