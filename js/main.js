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

function actionOnclick(Action,CustomerID){
    if(Action == "Edit")
    {
        if(confirm("¿Seguro deseas editar esta información?") == true)
        {
            window.open("Register.php?ActionType=Edit&Loc=MC&ID="+CustomerID,"_self",null,true);
        }
    }
    else if(Action == "Delete")
    {
        if(confirm("¿Seguro deseas eliminar esta información?") == true)
        {
            window.open("ClientesAccion.php?ID="+CustomerID,"_self",null,true);
        }
    }
}	

function OrderOnclick(OrderID)
{
    if(confirm("¿Seguro quieres cancelar la orden?") == true)
    {
        window.open("CuentaAccion.php?oID="+OrderID,"_self",null,true);
    }
}
 
	