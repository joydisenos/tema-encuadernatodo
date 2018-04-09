<div class="wrap">
    <h1><?php _e( 'Servicios', 'encuadernatodo' ); ?></h1>

    <?php $item = encuadernatodo_get_servicio( $id ); ?>

    <form action="" method="post">

        <table class="form-table">
            <tbody>
                <tr class="row-nombre">
                    <th scope="row">
                        <label for="nombre"><?php _e( 'Nombre del Servicio', 'encuadernatodo' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="nombre" id="nombre" class="regular-text" placeholder="<?php echo esc_attr( '', 'encuadernatodo' ); ?>" value="<?php echo esc_attr( $item->nombre ); ?>" required="required" />
                    </td>
                </tr>
                <tr class="row-precio">
                    <th scope="row">
                        <label for="precio"><?php _e( 'Precio', 'encuadernatodo' ); ?></label>
                    </th>
                    <td>
                        <input type="number" name="precio" id="precio" class="regular-text" placeholder="<?php echo esc_attr( '', 'encuadernatodo' ); ?>" value="<?php echo esc_attr( $item->precio ); ?>" required="required" />
                    </td>
                </tr>
                <tr class="row-activo">
                    <th scope="row">
                        <?php _e( 'Activo', 'encuadernatodo' ); ?>
                    </th>
                    <td>
                        <label for="activo"><input type="checkbox" name="activo" id="activo" value="on" <?php checked( $item->activo, 'on' ); ?> /> <?php _e( '', 'encuadernatodo' ); ?></label>
                    </td>
                </tr>
             </tbody>
        </table>

        <input type="hidden" name="field_id" value="<?php echo $item->id; ?>">

        <?php wp_nonce_field( 'servicio-new' ); ?>
        <?php submit_button( __( 'Actualizar', 'encuadernatodo' ), 'primary', 'submit_servicio' ); ?>

    </form>
</div>