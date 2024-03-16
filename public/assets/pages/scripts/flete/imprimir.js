function imprimirTicket(boton) {
    const fila = boton.parentNode.parentNode;
    const id = fila.cells[0].innerText;
    const placas_truck = fila.cells[1].innerText;
    const mt3 = fila.cells[2].innerText;

    const ticketHTML = `
        <div class="ticket">
            <div class="ticket-header">Ticket</div>
            <div class="ticket-content">
                <p>#Flete: ${id}</p>
                <p>#Placas: ${placas_truck}</p>
                <p>Descripción: ${mt3}</p>
            </div>
        </div>
    `;

    // Abrir una ventana nueva con el contenido del ticket para imprimir
    const ventana = window.open('', '_blank');
    ventana.document.write(ticketHTML);
    ventana.document.close();
    ventana.print();
}
  