<h2 class="text-green-50 text-30 mb-[12px]">Registro</h2>
<form action="index.php" method="POST" class="grid grid-cols-1 gap-[20px]">
    <input class="rounded-[10px] pl-[21px] h-[55px] bg-input text-placeholder pt-5px focus:outline-none w-full my-auto text-[15px]" type="text" id="nombre" name="nombre" placeholder="Nombre y Apellidos" value="<?= $datos['nombre'].$datos['apellidos'] ?>">
    <input class="rounded-[10px] pl-[21px] h-[55px] bg-input text-placeholder pt-5px focus:outline-none w-full my-auto text-[15px]" type="text" id="nif" name="nif" placeholder="NIF" value="<?= $datos['nif'] ?>">
    <input class="rounded-[10px] pl-[21px] h-[55px] bg-input text-placeholder pt-5px focus:outline-none w-full my-auto text-[15px]" type="text" id="pass" name="pass" placeholder="Password" value="<?= $datos['pass2'] ?>">
    <input class="rounded-[10px] pl-[21px] h-[55px] bg-input text-placeholder pt-5px focus:outline-none w-full my-auto text-[15px]" type="text" id="pass2" name="pass2" placeholder="Repeat Password" value="<?= $datos['pass2'] ?>">
    <input class="rounded-[10px] pl-[21px] h-[55px] bg-input text-placeholder pt-5px focus:outline-none w-full my-auto text-[15px]" type="text" id="correo" name="correo" placeholder="Mail" value="<?= $datos['correo'] ?>">
    <label class="flex items-center justify-end">
        <input class="appearance-none w-3 h-3 rounded-sm bg-input checked:bg-rosa " type="checkbox" id="terminos" name="terminos">
        <span  class=" text-white/80 ml-2">He leído y acepto la <a class=" underline" href="#">política de privacidad</a></span>
    </label>
    <input class="rounded-[10px] h-[55px] bg-rosa text-center text-22 font-semibold text-white" type="submit" name="enviar" value="Enviar">
</form>
