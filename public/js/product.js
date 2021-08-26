let active = true;
let id = getLastPartUrl();
let buttonElem = "<button class=\"product-about__btn btn-purple btn\">Add to cart</button>";
let linkElem = "<a href=\"\\login\" class=\"product-about__btn btn-purple btn\">Add to cart</a>";

const outputProduct = data => {
    let html = `          
                  <div class="product-about__item">
                    <div class="product-about__image">
                      <img src="/public/products/${data.image}" alt="">
                    </div>
                    <div class="product-about__text">
                      <p class="product-about__name">${data.title}</p>
                      <p class="product-about__description">${data.description}</p>
                      <div class="product-about__price-wrapper">
                        <p class="product-about__price">${data.price} $</p>
                        <div class="product-about__btn-button"></div>
                      </div>
                    </div>
                  </div>
              `;
    document.querySelector('.product-item__wrapper').innerHTML = html.trim();
};
getData(`api/product/${id}`)
    .then((data) => {
        outputProductTitle(data.category, data.title);
        outputProduct(data);
        let productData = data;
        getData(`api/user`)
            .then((data) => {
                if (data.auth) {
                    let buttonsAdmin = `<div class="product-about__btn-button--admin">
                                            <a href="/delete/${productData.id}" class="product-about__btn btn-red btn">Delete</a>
                                            <a href="/update/${productData.id}" class="product-about__btn btn-green btn">Update</a>
                                            </div>`;
                    document.querySelector('.product-about__btn-button').innerHTML = buttonElem;

                    if (data.status === 10) {
                        document.querySelector('.product-about__btn-button').innerHTML += buttonsAdmin.trim();
                    }
                    let button = document.querySelector('.product-about__btn');
                    button.addEventListener("click", function(e) {
                        e.preventDefault();
                        if (active) {
                            button.classList.add("product-about__btn--disabled");
                            document.querySelector('.product-about__btn--disabled').innerText = 'Added';

                            const request = new XMLHttpRequest();
                            const url = `/buy`;
                            const params = `id=${productData.id}`;

                            request.open("POST", url, true);
                            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            request.send(params);

                            active = false;
                        }
                    });
                }else {
                    document.querySelector('.product-about__btn-button').innerHTML = linkElem;
                }
            });
    })
    .catch(err => console.log(`Error: ${err}`))
