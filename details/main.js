let shop = document.getElementById("shop");


//to store data 

let basket = JSON.parse(localStorage.getItem("data")) || [];

//using arrow function to reduce the html code
let genarateShop = () =>{
    return (shop.innerHTML =shopItemData.map((x) => {
        let {id,name,price,disc,img} = x;
        let search = basket.find((x) =>x.id === id) || [];
        return `
    
        <div class="item">
        <img src="${img}" alt="" width="220" height="150px">
        <div class="details">
            <h3>${name}</h3>
            <p>${disc}</p>
            <div class="price-quntity">
                <h2>$${price}</h2>
                <div class="buttons">
                    <i class="bi bi-dash-lg" onclick="dicrement(${id})"></i>
                    <div id=${id} class="quantity">${search.item === undefined? 0: search.item}</div>
                    <i class="bi bi-plus-lg" onclick="increment(${id})"></i>
                </div>
            </div>
        </div>
        </div>
        
        `;
    }).join(""))
    
}

genarateShop ()

//increment function

let increment = (id) => {
    let selectItem = id;
    
    let search = basket.find((x) => x.id ===selectItem.id);

    if(search === undefined){
        basket.push({
            id:selectItem.id,
            item:1,
        });
    
    }else{
        search.item +=1;
    }

   localStorage.setItem("data",JSON.stringify(basket));
    //console.log(basket);
    update(selectItem.id);

};//to increse quentity

let dicrement = (id) => {
    let selectItem = id;
    
    let search = basket.find((x) => x.id ===selectItem.id);

    if(search === undefined) return
    else if(search.item === 0) return;
    else{
        search.item -=1;
    }

    update(selectItem.id);
    basket = basket.filter((x) => x.item !== 0);
    //console.log(basket);

    localStorage.setItem("data",JSON.stringify(basket));
};//to decrese quentity

let update = (id) => {
    let search = basket.find((x)=> x.id === id)
    console.log(search.item);
    document.getElementById(id).innerHTML = search.item;
    calculation();
};//to update quentity


let calculation =() =>{
    let cartIcon = document.getElementById("cartAmount");
    cartIcon.innerHTML = basket.map((x) => x.item).reduce((x,y) => x+y , 0);
    
}

calculation();
