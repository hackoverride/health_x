<?php
echo '
<div id="newitem" class="element" >
    <form action="" method="POST" autocomplete="off">
        <input type="text" name="name" placeholder="Product Name" required/>
        <input type="text" name="brand" placeholder="Brand" />
        <h4>per 100g</h4>
        <label>Energy</label><input type="number" name="energy" placeholder="0.00" step="1" min="0" max="5000" />
        <label>KCAL</label><input type="number" name="kcal" placeholder="0.00" step="1" min="0" max="2000" />
        <label>Fat</label><input type="number" name="fat" placeholder="0.00" step="0.01" min="0" max="100.00" />
        <label>Carbs</label><input type="number" name="carbs" placeholder="0.00" step="0.01" min="0" max="100.00" />
        <label>Fiber</label><input type="number" name="fiber" placeholder="0.00" step="0.01" min="0" max="100.00" />
        <label>Protein</label><input type="number" name="protein" placeholder="0.00" step="0.01" min="0" max="100.00" />
        <label>Salt</label><input type="number" name="salt" placeholder="0.00" step="0.01" min="0" max="100.00" />
        <input type="submit" name="newItem" value="Submit" class="knapp"/>
    </form>
</div>
';


?>