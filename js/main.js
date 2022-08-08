$('#reg').click(function(){
    window.open('register.html',_self);
});

function ManagementOnclick(){
    if(confirm("Solo los administradores tienen permitido acceder a esta página. Inicie sesión como administrador.") == true)
    {
        window.open("Login.php?Role=Admin","_self",null,true);
    }
}

function addToCartOnclick(ProductID)
{	
    if(confirm("Estas seguro que deseas agregar este producto al carrito") == true){
    window.open("Order.php?ProductID="+ProductID,"_self",null,true);
    }
}

function abrirTicket(button){
    window.open("ticket.php","_self",null,true);
}

	
 
	