<h1>Detalle del pedido</h1>


<?php if(isset($pedido)): ?>
        <?php if(isset($_SESSION['admin'])): ?>
            <h3>Cambiar estado del pedido</h3>

            <form action="<?=base_url?>pedido/estado" method="POST">

                <!-- para que el valor del pedido se grabe  -->
                <input type="hidden" value="<?=$pedido->id_pedido?>" name="pedido_id" /> 
                <select name="estado" id="">

                    <!-- 
                    <option value="confirm">Pendiente</option>
                    <option value="preparation">En preparación</option>
                    <option value="ready" >Preparado para enviar</option>
                    <option value="sended" >Enviado</option> 
                    -->
                    <!-- usando la ternaria -->
                    <option value="confirm" <?=$pedido->estado == "confirm" ? 'selected' : '';?>>Pendiente</option>
                    <option value="preparation" <?=$pedido->estado == "preparation" ? 'selected' : '';?>>En preparación</option>
                    <option value="ready" <?=$pedido->estado == "ready" ? 'selected' : '';?>>Preparado para enviar</option>
                    <option value="sended" <?=$pedido->estado == "sended" ? 'selected' : '';?>>Enviado</option>
                </select>
                <input type="submit" value="Cambiar estado" />
            </form>
            <br/>
        <?php endif; ?>

        <h3>Datos del pedido:</h3>


        Estado: <?=Utils::showStatus($pedido->estado)?> <br/>
        Número del pedido: <?=$pedido->id_pedido?> <br/>
        Total a pagar: <?=$pedido->costo?> <br/>
        <br/>
        Productos:
        <br/>
        <table>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Unidades</th>
            </tr>            
            <?php while($producto = $productos->fetch_object()): ?>
                <tr>
                    <td>
                        <?php if ($producto->imagen != null): ?>
                            <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class="img_carrito"/>
                        <?php else: ?>
                            <img src="<?= base_url ?>assets/img/ferreteria.png" class="img_carrito"/>
                        <?php endif; ?>
                    </td>
                    <td>
                        <!-- <?=$producto->nombre_producto?> -->
                        <a href="<?=base_url?>producto/ver&id=<?=$producto->id_producto?>"><?=$producto->nombre_producto?></a>
                
                    </td>
                    <td>
                        <?=$producto->precio?>
                    </td>
                    <td>
                        <?=$producto->unidades?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php endif; ?>
