Para configurar setup.bat en Windows

Se debe reemplazar las invocaciones a php por la ruta completa donde se encuentra ubicado el php en windows.
#!/usr/bin/env sh
curl -s http://getcomposer.org/installer | <Ruta de PHP en Windows>
<Ruta de PHP en Windows> composer.phar install

Por ejemplo si el php esta instalado en:
C:\php\bin\php.exe

el archivo setup.bat quedaría asi:
#!/usr/bin/env sh
curl -s http://getcomposer.org/installer | C:\\php\\bin\\php.exe
C:\\php\\bin\\php.exe composer.phar install

Recuerda agregar \\ el doble slash para la ruta del archivo.

