// *********l'heure et date*********************
let displayTime = document.querySelector('.display-time')
let displayDate = document.querySelector('.display-date')
let displayDay = document.querySelector('.display-day')
let colorArray = [ 'rgb(255,255,255)']

let i = 0

const myDate = () => {
    if (i === colorArray.length) {
        i = 0;
    }
    let date = new Date()
    let year = date.getFullYear()
    let month = date.getMonth()
    let dateNumber = date.getDate()
    let day = date.getDay()

    // if(hours< 10 ){ hours = '0' + hours; }
    // if( minutes< 10 ){ minutes = '0' + minutes; }
    // if( seconds < 10 ){ seconds = '0' + seconds; }

    let hours = date.getHours()
    let minutes = date.getMinutes()
    let seconds = date.getSeconds()
    let mapDay = new Map()

    mapDay.set(0, 'Samedi')
    mapDay.set(1, 'Lundi')
    mapDay.set(2, 'Mardi')
    mapDay.set(3, 'Mercredi')
    mapDay.set(4, 'Jeudi')
    mapDay.set(5, 'Venderdi')
    mapDay.set(6, 'Dimenche')



    let dayName = mapDay.get(day);
    displayTime.innerHTML = `${hours}:${minutes}:${seconds}`
    displayDate.innerHTML = `${dayName} ${dateNumber}/${month+1}/${year}`
    displayTime.style.color = colorArray[i];
    displayDate.style.color = colorArray[i];
    i++
}
setInterval(myDate , 1000);
setInterval(myDate , 1000);
// ****************progressbar*****************************
var progressVal = $('progress').val(),
    progressStep = 20,
    progressDirection = 1;

setInterval(function() {
  console.log(progressDirection, progressVal);
  
  if (progressDirection > 0 && progressVal < 100) {
    progressVal += progressStep;
    $('progress').val(progressVal);
  } else if (progressDirection < 0 && progressVal > 0) {
  progressVal -= progressStep;
 $('progress').val(progressVal);
 } else if (progressVal == 100) {
   progressDirection = -1;
  } else if (progressVal == 0) {
    progressDirection = 1;
  }
}, 2000)

// ************PODIUM*********************************
$(document).ready(function () {
    var clube = $('ul#filtro li a#clube');
});
// ******************météo******************************
var css_file = document.createElement("link");
var widgetUrl = location.href;
css_file.setAttribute("rel", "stylesheet");
css_file.setAttribute("type", "text/css");
css_file.setAttribute("href", 'https://s.bookcdn.com/css/w/booked-wzs-widget-275.css?v=0.0.1');
document.getElementsByTagName("head")[0].appendChild(css_file);
function setWidgetData_15145(data) { if (typeof (data) != 'undefined' && data.results.length > 0) { for (var i = 0; i < data.results.length; ++i) { var objMainBlock = document.getElementById('m-booked-weather-bl250-15145'); if (objMainBlock !== null) { var copyBlock = document.getElementById('m-bookew-weather-copy-' + data.results[i].widget_type); objMainBlock.innerHTML = data.results[i].html_code; if (copyBlock !== null) objMainBlock.appendChild(copyBlock); } } } else { alert('data=undefined||data.results is empty'); } } var widgetSrc = "https://widgets.booked.net/weather/info?action=get_weather_info;ver=7;cityID=19417;type=3;scode=2;ltid=3458;domid=581;anc_id=9731;countday=undefined;cmetric=1;wlangID=3;color=137AE9;wwidth=428;header_color=ffffff;text_color=333333;link_color=08488D;border_form=1;footer_color=ffffff;footer_text_color=333333;transparent=0;v=0.0.1"; widgetSrc += ';ref=' + widgetUrl; widgetSrc += ';rand_id=15145'; var weatherBookedScript = document.createElement("script"); weatherBookedScript.setAttribute("type", "text/javascript"); weatherBookedScript.src = widgetSrc; document.body.appendChild(weatherBookedScript) 


// *****************************************************************
class Etudiant {

  constructor(nom, numberEtudiants) {
      this.matricule = numberEtudiants + 1 ;
      this.nom = nom;
      this.nbrNotes = 0;
      this.tabNotes = [];
  }
  
  get getmatricule() {
        return this.matricule ;
   } ;
   
   get getNom() {
        return this.nom ;
   } ;

   set setNom(newNom) {
         this.nom=newNom ;
   } ;
      
   get getNbrNotes() {
        return this.nbrNotes ;
   };

  
   
    ajouterNote(newNote){
          
         this.tabNotes.push(newNote);
         this.nbrNotes++;
     } 
      
    moyenneNotes(){
        
        var sommeNotes = 0;
        
        if(this.nbrNotes>0){
            
            this.tabNotes.forEach((item, index) => {
                
                sommeNotes +=  this.tabNotes[index];
                
            })
            
            
           return  sommeNotes / this.nbrNotes;
            
        }else{
            
            return "Aucune note n'est disponible";
        } 
          
          
    }
    
    admis(){
        
        if(this.moyenneNotes()>=10){
            
            return true;
            
        }else {
            
            return false;
        }
          
          
    }
    
    
    
     affichage(){
          
          var displayInfos =  'La matricule de l\'etudiant : ' + this.matricule + '\n' ;
              displayInfos +=  'Le nom de l\'etudiant : ' + this.nom + '\n' ;
              if(this.nbrNotes>0){
              displayInfos +=  'Le nombre des notes : ' + this.nbrNotes + '\n' ;
              displayInfos +=  'La moyenne des notes : ' + this.moyenneNotes().toFixed(2) + '\n' ;
              displayInfos +=  'La liste des notes : '  + '\n' ;
              
                this.tabNotes.forEach((item, index) => {
                
                   displayInfos +=  (index+1).toString() + '. ' + this.tabNotes[index]  + '\n' ;
                
               })
              
              
             }
              
              return displayInfos;
              
    } 
    
}

class GestionsEtudiants {

  constructor() {
      this.listEtudiants = [];
  }
  
  
  
  getListEtudiants(){
  
      return  this.listEtudiants;
  }
  
   
  ajouterEtudiant(_etudiant){
          
         this.listEtudiants.push(_etudiant);
         
  } 
  
  getNombresEtudiants(){
      
      return this.listEtudiants.length;
  }
  
  setInfosFicheEtudiant(_etudiant){
      
       for (i = 0; i < this.listEtudiants.length; i++) {
                
             if(this.listEtudiants[i].getmatricule == _etudiant.getmatricule){
                 
                 this.listEtudiants[i] =  _etudiant;
                 
             }
       } 
      
  }
  
  comparer(_etudiant1,_etudiant2){
        
         if(_etudiant1.moyenneNotes() == _etudiant2.moyenneNotes()){
            
            return true;
            
        }else {
            
            return false;
        }
          
          
    }
    
}


// Test Code 
var _gestionnaire = new GestionsEtudiants();
var _etudiant1 = new Etudiant ("Tom",_gestionnaire.getNombresEtudiants()) ;
_etudiant1.ajouterNote(15);
_etudiant1.ajouterNote(10);
_gestionnaire.ajouterEtudiant(_etudiant1)
console.log(_etudiant1.affichage())

console.log("**************************************")

var _etudiant2 = new Etudiant ("Bernard",_gestionnaire.getNombresEtudiants()) ;
_gestionnaire.ajouterEtudiant(_etudiant2);
_etudiant2.ajouterNote(15);
_etudiant2.ajouterNote(10);
// _etudiant2.ajouterNote(15);
console.log(_etudiant2.affichage())

console.log(_gestionnaire.comparer(_etudiant1,_etudiant2))