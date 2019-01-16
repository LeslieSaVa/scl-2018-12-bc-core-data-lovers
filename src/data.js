window.pokemones = {
//Lo oficial de aqui hacia abajo 
  computeStats: (data,type) =>{
    const dataPokemon = data;
    let sum = 0;
    dataPokemon.forEach(element =>{
      if(element.type.indexOf(type) !== -1){
        sum++ 
      }
    })
    return sum 
  },

  filterData: (data,condition) => {
  const dataPokemon = data;
  if(condition === ""){
    return data;
  }
  const pokemonResultFilter = dataPokemon.filter(pokemon => {
    return pokemon.type.indexOf(condition) !== -1 ;
  })
  return pokemonResultFilter
 },

sortData: (data, sortBy, sortOrder) => {
  const dataPokemon = data
  if (sortBy === "name" && sortOrder === "az"){
    dataPokemon.sort((prev, next)=> {
      if (prev.name > next.name) {
        return 1;
      }
      if (prev.name < next.name) {
        return -1;
      }
      return 0;
    })
  }
  if (sortBy === "name" && sortOrder === "za"){
    dataPokemon.sort((prev, next)=> {
      if (prev.name < next.name) {
        return 1;
      }
      if (prev.name > next.name) {
        return -1;
      }
      return 0;
    })
  }
  if (sortBy === "num" && sortOrder === "small-big"){
    dataPokemon.sort((prev, next)=> {
      if (prev.id > next.id) {
        return 1;
      }
      if (prev.id < next.id) {
        return -1;
      }
      return 0;
    })
  }
  if (sortBy === "num" && sortOrder === "big-small"){
    dataPokemon.sort((prev, next)=> {
      if (prev.id < next.id) {
        return 1;
      }
      if (prev.id > next.id) {
        return -1;
      }
      return 0;
    })
  }
  return dataPokemon
 }
}

window.api = {

  filterData: (data) => {
    const dataPokemon = data;
    const langFilter = dataPokemon.filter(entries => {
      return entries.language.name === "es" ;
    })
    return langFilter 
   },
}