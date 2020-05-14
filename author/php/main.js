
let id = $("input[name*='author_id']");
id.attr("readonly","readonly")


$(".btnedit").click( e=>{
    let textvalues = displayData(e)


    let bookname = $("input[name*='book_name']");
    let authorname = $("input[name*='author_name']");
    let bookprice = $("input[name*='book_price']");

    id.val(textvalues[0]);
    bookname.val(textvalues[1]);
    authorname.val(textvalues[2]);
    bookprice.val(textvalues[3].replace("£", ""));
});

function displayData(e){
    let id = 0;
    const td = $("#tbody tr, td");
    let textvalues = [];

    for(const value of td){
        if (value.dataset.id == e.target.dataset.id){
            textvalues[id++] = value.textContent;
        }

    }
    return textvalues;
}


