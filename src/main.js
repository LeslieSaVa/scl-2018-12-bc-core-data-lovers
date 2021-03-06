//Initialization for Components Materialize
document.addEventListener("DOMContentLoaded", function(){
 window.M.AutoInit();
});
//Volver al inicio apretando inicio en el menú 
document.getElementById("back-to-initial").addEventListener("click", () => {
  document.location = "index.html";
})
 //Volver al inicio apretando inicio en el menú responsive
 document.getElementById("back-to-initial-responsive").addEventListener("click", () => {
  document.location = "index.html";
  }) 
//Botón calculadora del a  navbar responsive
 document.getElementById("calculator-btn-responsive").addEventListener("click",()=>{
  document.getElementById("first-page").style.display="none";
  document.getElementById("second-page").style.display="none";
  document.getElementById("contact-form").style.display="none";
  document.getElementById("form-pokemon").style.display="block";
}) 
//Botón contacto del a  navbar responsive
document.getElementById("contact-btn-responsive").addEventListener("click",()=>{
  document.getElementById("first-page").style.display="none";
  document.getElementById("second-page").style.display="none";
  document.getElementById("form-pokemon").style.display="none";
  document.getElementById("contact-form").style.display="block";
})  
//Manejo del cálculo 
document.getElementById("select-type-pokemon").addEventListener("change", () => {
  let type = document.getElementById("select-type-pokemon").value;
  document.getElementById("result-sum").innerHTML = `
  <h5>Existen ${window.pokemones.computeStats(allPokemon.pokemon,type)} pokemones del tipo ${type} en la región de Kanto</h5>
  <div id="chart-container"><canvas id="myChart"></canvas></div>`;
  upDateChart(window.pokemones.filterData(allPokemon.pokemon,type));
  });
 
let allPokemon;
const content = document.querySelector("#content")
  fetch ("data/pokemon/pokemon.json")
  .then(data => data.json())
  .then(data => {
      allPokemon = data;
   })
//Click en la imagen de cada pokemon
let pokemonImages = document.getElementsByClassName("img-pokemon");
function clickOnImg (data) {
    for (let i = 0; i<pokemonImages.length; i++) {
      pokemonImages[i].addEventListener("click",() =>{
      //   //api para las fortalezas
      //   fetch("https://pokeapi.co/api/v2/type/")
      //   .then(newData => newData.json() )
      //   .then(newData => {
      //     console.log(newData);

      //   document.getElementById("FORTALEZA").innerHTML += `<p>${window.api.filterData1(newData.results)[0].name}</p>`    
      // })  
        //api para el texto,especie y habitat de cada pokemon 
        fetch("https://pokeapi.co/api/v2/pokemon-species/"+data[i].id+"/")
        .then(newData => newData.json() )
        .then(newData => {
          console.log(newData);
              //let element = document.getElementById("textAPI"); 
              //let element1 = document.getElementById("pokemonSpecies");
              //let element2 = document.getElementById("pokemonHabitat");
        //esta funcion filter corresponde a otro objeto (api) y filtra el idioma 
        document.getElementById("textAPI").innerHTML += `<p>${window.api.filterData(newData.flavor_text_entries)[0].flavor_text}</p>`  
        document.getElementById("pokemonSpecies").innerHTML += `<p>${window.api.filterData(newData.genera)[0].genus}</p>`  
        document.getElementById("pokemonHabitat").innerHTML += `<p>${newData.habitat.name}</p>`  
      })  
        document.getElementById("first-page").style.display="none";
        document.getElementById("second-page").style.display="block";
        document.getElementById("second-page").innerHTML +=`
        <div class="container>
          <div class="row">
            <div id="name-number" class="col s12 m12">
              <div  class="card-panel teal grey"><span class="white-text" ><p class="flow-text">${data[i].name} Nº ${data[i].num}</p></span></div>
            </div>
          </div>
        </div>
        <div class="container">
        <div class="row">
            <div class="col s12 m6">
              <div class="card">
                <div id="card-profile" class="card-image">
                  <img  class="responsive-img" src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/${data[i].num}.png" alt="pokemon bulbasaur">
                </div>
                <div id="card-type" class="card-action">
                  <span class="white-text" >
                    <table  id="table-type">
                        <tr><div id="textAPI"></div></tr>
                    </table> 
                  </span>   
                </div>
              </div>
            </div>
           <div class="col s12 m6" >
              <div class="card-panel teal grey center-align">
                <span class="white-text" >
                  <table  id="table-info">
                   <tr>
                   <tr><h5 id="title-table-info-2ndpage">Información</h5></tr>
                     <th>ESPECIE</th>
                     <td class="tables"><div id="pokemonSpecies"></div></div></td> 
                   </tr>
                   <tr>
                     <th>TIEMPO APARICIÓN</th>
                     <td class="tables">${data[i].spawn_time} min </td> 
                   </tr>
                   <tr>
                     <th>ALTURA</th>
                     <td class="tables">${data[i].height}</td> 
                   </tr>
                   <tr>
                     <th>PESO</th>
                     <td class="tables">${data[i].weight}</td> 
                   </tr>
                   <tr>
                     <th>EGGS</th>
                     <td class="tables">${data[i].egg}</td> 
                   </tr>
                   <tr>
                     <th>HABITAT</th>
                     <td class="tables"><div id="pokemonHabitat"></div></td> 
                   </tr>
                   <tr>
                     <th>TIPO</th>
                     <td><div class="tagsizeOfType ${data[i].type[0]}">${data[i].type[0]}</div> <div class="tagsizeOfType ${data[i].type[1]}">${data[i].type[1]}</div></td>
                   </tr> 
                  </table>
                </span>
              </div>
           </div> 

           <div class="col s12 m6" >
            <div class="card-panel teal grey center-align">
              <span class="white-text" >
               <table  id="table-weaknesses">
                  <tr>
                    <td><h5 id="title-table-info-2ndpage">Debilidades</h5></td>
                    <td><div class="tagsizeOfWeaknesses ${data[i].weaknesses[0]}">${data[i].weaknesses[0]}</div> <div class="tagsizeOfWeaknesses ${data[i].weaknesses[2]}">${data[i].weaknesses[2]}</div> <div class="tagsizeOfWeaknesses ${data[i].weaknesses[4]}">${data[i].weaknesses[4]}</div></td>
                    <td><div class="tagsizeOfWeaknesses ${data[i].weaknesses[1]}">${data[i].weaknesses[1]}</div> <div class="tagsizeOfWeaknesses ${data[i].weaknesses[3]}">${data[i].weaknesses[3]}</div> <div class="tagsizeOfWeaknesses ${data[i].weaknesses[5]}">${data[i].weaknesses[5]}</div></td> 
                  </tr> 
               </table>
              </span>
            </div>
           </div> 
            <div class="row">
            <div id="btn-go-back">
                <a href="" class="waves-effect waves-light btn">Volver al Inicio</a>
            </div>
            </div>
        </div>  
        </div>   
        `
      })
    }
  }   
//Manejo de la función filtrar
document.getElementById("select-type-pokemon").addEventListener("change",(evento)=>{
  evento.preventDefault();
  let type = document.getElementById("select-type-pokemon").value;
      showPokemons(window.pokemones.filterData(allPokemon.pokemon,type));
      clickOnImg(window.pokemones.filterData(allPokemon.pokemon,type));
 })
//visualización de la data como array para función filter
  function showPokemons(data){
    content.innerHTML="";
      if (Array.isArray(data)){
        for (let valor of data){
          content.innerHTML +=`
            <div class="col s6 m3">
              <div id="card1" class="card">
                <div  id="images" class="card-image responsive-img"> 
                  <img class="img-pokemon responsive-img" src= "https://assets.pokemon.com/assets/cms2/img/pokedex/detail/${valor.num}.png">
                </div>
                <div class="card-content">
                  <p class="pokenumber">Nº ${valor.num}</p>
                  <span class="card-title ">${valor.name}</span>
                  <span class="tagsize ${valor.type[0]} ">${valor.type[0]}</span>
                  <span class="tagsize ${valor.type[1]} ">${valor.type[1]}</span>
                </div>
              </div>
            </div> 
          `
      }
      }
  }
  //Manejo de la función ordenar
  document.getElementById("option-order").addEventListener("change", () => {
    document.getElementById("result-sum").innerHTML = "";
    let type = document.getElementById("select-type-pokemon").value;
    content.innerHTML = "";
    if (document.getElementById("option-order").value === "az" || document.getElementById("option-order").value === "za"){
        for (let valor of window.pokemones.sortData(window.pokemones.filterData(allPokemon.pokemon,type),"name",document.getElementById("option-order").value)){
          content.innerHTML +=`
            <div class="col s6 m3">
              <div id="card1" class="card">
                <div  id="images" class="card-image">
                  <img class="img-pokemon responsive-img" src= "https://assets.pokemon.com/assets/cms2/img/pokedex/detail/${valor.num}.png">
                </div>
                <div class="card-content">
                  <p>#${valor.num}</p>
                  <span class="card-title">${valor.name}</span>
                  <span class="tagsize ${valor.type[0]}">${valor.type[0]}</span>
                  <span class="tagsize ${valor.type[1]}">${valor.type[1]}</span>
                </div>
              </div>
            </div>
          ` 
         clickOnImg(window.pokemones.sortData(allPokemon.pokemon,"name",document.getElementById("option-order").value));
    }
    }
    if (document.getElementById("option-order").value === "small-big" || document.getElementById("option-order").value === "big-small"){
        for (let valor of window.pokemones.sortData(allPokemon.pokemon,"num",document.getElementById("option-order").value)){
          document.getElementById("result-sum").innerHTML = "";
          content.innerHTML +=`
           <div class="col s6 m3">
              <div id="card1" class="card">
                <div  id="images"  class="card-image">
                 <img class="img-pokemon responsive-img" src= "https://assets.pokemon.com/assets/cms2/img/pokedex/detail/${valor.num}.png">
                </div>
                <div class="card-content">
                  <p>#${valor.num}</p>
                  <span class="card-title">${valor.name}</span>
                  <span class="tagsize ${valor.type[0]}">${valor.type[0]}</span>
                  <span class="tagsize ${valor.type[1]}">${valor.type[1]}</span>
               </div>
             </div>
           </div>
      `
      clickOnImg(window.pokemones.sortData(allPokemon.pokemon,"num",document.getElementById("option-order").value));
 }
 }
 })
 function runData () {
   showPokemons(allPokemon.pokemon) 
   clickOnImg(allPokemon.pokemon)
//Botón calculadora del menu  navbar
  document.getElementById("calculator-btn").addEventListener("click",()=>{
  document.getElementById("first-page").style.display="none";
  document.getElementById("second-page").style.display="none";
  document.getElementById("contact-form").style.display="none";
  document.getElementById("form-pokemon").style.display="block";
})
//Botón limpiar calculadora
document.getElementById("clear-btn").addEventListener("click",()=>{
  document.getElementById("my-form").reset();
})
//Botón Calcular calculadora
document.getElementById("result-btn").addEventListener("click",()=>{
  let myCandys = parseInt(document.getElementById("number1").value);
  let needCandys = parseInt(document.getElementById("number2").value);
  let resultCandys=needCandys-myCandys; 
  let resultKm=resultCandys*5;
  document.getElementById("result").value= resultKm;
}) 
//Botón contacto del menu navbar
document.getElementById("contact-btn").addEventListener("click",()=>{
document.getElementById("first-page").style.display="none";
document.getElementById("second-page").style.display="none";
document.getElementById("form-pokemon").style.display="none";
document.getElementById("contact-form").style.display="block";
  })  
 }
 window.onload = runData;
//Gráfico número de pokemones por tipo
function upDateChart (data) {
  let myChart = document.getElementById("myChart").getContext("2d");
  //Global Options
  window.Chart.defaults.global.defaultFontFamily = "Lato";
  window.Chart.defaults.global.defaultFontSize = 18;
  window.Chart.defaults.global.defaultFontColor = "#777";
  
  let chart = new window.Chart(myChart, {
      type: 'pie',
      data: {
          datasets: [{
              label: "Total Pokemones",
              data : [data.length, 151 - data.length],
              backgroundColor:[
                "rgba(75, 192, 192, 0.6)",
                "rgba(255, 99, 132, 0.6)",
              ],
              borderWidth:1,
              borderColor: "#777",
              hoverBorderWidth:3,
          }
        ],
          labels: [
            document.getElementById("select-type-pokemon").value,
            "Otros",
          ] 
      },
      options: {
        title: {
          display: true,
          text: "Tipos de Pokemon"
        },
        responsive: true, 
      }
  });
  window.chart.update();
};
//<a>${newData.results[i].url}</a>
//Buscador 
document.addEventListener("DOMContentLoaded", function(){
  let options = {
    data: {
    },
    onAutocomplete: function(texto){
      document.getElementById("result-sum").innerHTML="";
      showPokemons(window.pokemones.searchPoke(allPokemon.pokemon, texto));
      clickOnImg(window.pokemones.searchPoke(allPokemon.pokemon, texto));
    }
  }
  let allPokemon;
  fetch ("data/pokemon/pokemon.json")
  .then(data => data.json())
  .then(data => {
    allPokemon = data;
    fullDataName(data);
   })
  function fullDataName (allPokemon){
  for (let i=0; i< allPokemon.pokemon.length; i++){
    let pokemonName = allPokemon.pokemon[i].name;
    options.data[pokemonName]=`https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/${allPokemon.pokemon[i].id}.png`;
  }
}
   let elems = document.querySelectorAll(".autocomplete");
      M.Autocomplete.init(elems,options); 
});
