   <!-- Anomalia -->
   <div class="overlay" id="overlay">
       <div class="popup" id="popup">
           <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
           <h3></h3>
           <h4>ANOMALÍA DETECTADA</h4>
           <form name="anomalias" id="form-anomalias" enctype="multipart/form-data"
               onsubmit="event.preventDefault(); saveAnomalia()" data-anomalia="">
               <div class="contenedor-selects">
                   <select class="contenedor-selects" name="urgencia" anomalia=1 id="form-select-tipo">
                       <option value="" disabled selected>-- Selecciona una opción *</option>
                       <option value="Urgente">Urgente</option>
                       <option value="Inmediatamente">Inmediatamente</option>
                       <option value="Normal">Normal</option>
                   </select>
                   <label id="form-select-tipo-error" class="text-sm text-red-500 tracking-wide mb-3"></label>
               </div>
               <div class="contenedor-inputs">
                   <input placeholder="Marca" name="marca" id="form-marca"anomalia=1>
                   <input placeholder="Modelo" name="modelo" id="form-modelo" anomalia=1>
                   <input placeholder="Medidas" name="medidas" id="form-medidas" anomalia=1>
                   <textarea class="form-control" rows="3" name="descripcion" placeholder="Describa el problema"
                       id="form-description" anomalia=1></textarea>
                   <label id="form-description-error" class="text-sm text-red-500 tracking-wide mb-3"
                       anomalia=1></label>
                   <input id="form-foto" type="file" class="form-control" name="imagen" id="image" anomalia=1 />
                   <label id="form-foto-error" class="text-sm text-red-500 tracking-wide mb-3" anomalia=1></label>
               </div>
               <input type="hidden" value="{{ $inspeccion->id }}" name="inspeccion_id">
               <input type="hidden" value="1" name="tipo_inspeccion_id">
               <button type="submit">Guardar Datos</button>
           </form>
       </div>
   </div>
