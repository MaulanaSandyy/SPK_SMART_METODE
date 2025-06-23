<?php include 'includes/header.php'; ?>

<div class="container">
    <h1>Sistem Pendukung Keputusan Pemilihan Laptop</h1>
    <p>Menggunakan Metode SMART (Simple Multi-Attribute Rating Technique)</p>
    
    <div class="form-container">
        <form id="smartForm" action="process.php" method="post">
            <h2>Kriteria dan Bobot</h2>
            <div class="form-group">
                <label>Total Bobot: <span id="totalBobot">185</span></label>
            </div>
            
            <table id="kriteriaTable">
                <thead>
                    <tr>
                        <th>Kode Kriteria</th>
                        <th>Kriteria</th>
                        <th>Bobot</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>C1</td>
                        <td><input type="text" name="kriteria[]" value="RAM laptop" readonly></td>
                        <td><input type="number" name="bobot[]" value="40" min="1" class="bobot-input"></td>
                    </tr>
                    <tr>
                        <td>C2</td>
                        <td><input type="text" name="kriteria[]" value="Processor laptop" readonly></td>
                        <td><input type="number" name="bobot[]" value="35" min="1" class="bobot-input"></td>
                    </tr>
                    <tr>
                        <td>C3</td>
                        <td><input type="text" name="kriteria[]" value="Ukuran layar laptop" readonly></td>
                        <td><input type="number" name="bobot[]" value="25" min="1" class="bobot-input"></td>
                    </tr>
                    <tr>
                        <td>C4</td>
                        <td><input type="text" name="kriteria[]" value="Kapasitas penyimpanan laptop" readonly></td>
                        <td><input type="number" name="bobot[]" value="30" min="1" class="bobot-input"></td>
                    </tr>
                    <tr>
                        <td>C5</td>
                        <td><input type="text" name="kriteria[]" value="Ketahanan baterai" readonly></td>
                        <td><input type="number" name="bobot[]" value="35" min="1" class="bobot-input"></td>
                    </tr>
                    <tr>
                        <td>C6</td>
                        <td><input type="text" name="kriteria[]" value="Harga laptop" readonly></td>
                        <td><input type="number" name="bobot[]" value="20" min="1" class="bobot-input"></td>
                    </tr>
                </tbody>
            </table>
            
            <h2>Alternatif Laptop</h2>
            <table id="alternatifTable">
                <thead>
                    <tr>
                        <th>Kode Alternatif</th>
                        <th>Nama Laptop</th>
                        <th>C1</th>
                        <th>C2</th>
                        <th>C3</th>
                        <th>C4</th>
                        <th>C5</th>
                        <th>C6</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>A1</td>
                        <td><input type="text" name="nama_alternatif[]" value="ASUS ROG Zephyrus G14"></td>
                        <td><input type="number" name="a1_c1" value="6"></td>
                        <td><input type="number" name="a1_c2" value="4"></td>
                        <td><input type="number" name="a1_c3" value="11"></td>
                        <td><input type="number" name="a1_c4" value="6"></td>
                        <td><input type="number" name="a1_c5" value="8"></td>
                        <td><input type="number" name="a1_c6" value="15"></td>
                    </tr>
                    <tr>
                        <td>A2</td>
                        <td><input type="text" name="nama_alternatif[]" value="Apple MacBook Air M2"></td>
                        <td><input type="number" name="a2_c1" value="8"></td>
                        <td><input type="number" name="a2_c2" value="6"></td>
                        <td><input type="number" name="a2_c3" value="14"></td>
                        <td><input type="number" name="a2_c4" value="3"></td>
                        <td><input type="number" name="a2_c5" value="6"></td>
                        <td><input type="number" name="a2_c6" value="12"></td>
                    </tr>
                    <tr>
                        <td>A3</td>
                        <td><input type="text" name="nama_alternatif[]" value="Lenovo ThinkPad X1 Carbon Gen 11"></td>
                        <td><input type="number" name="a3_c1" value="10"></td>
                        <td><input type="number" name="a3_c2" value="7"></td>
                        <td><input type="number" name="a3_c3" value="13"></td>
                        <td><input type="number" name="a3_c4" value="5"></td>
                        <td><input type="number" name="a3_c5" value="5"></td>
                        <td><input type="number" name="a3_c6" value="10"></td>
                    </tr>
                    <tr>
                        <td>A4</td>
                        <td><input type="text" name="nama_alternatif[]" value="HP Spectre x360 14"></td>
                        <td><input type="number" name="a4_c1" value="12"></td>
                        <td><input type="number" name="a4_c2" value="5"></td>
                        <td><input type="number" name="a4_c3" value="12"></td>
                        <td><input type="number" name="a4_c4" value="8"></td>
                        <td><input type="number" name="a4_c5" value="7"></td>
                        <td><input type="number" name="a4_c6" value="11"></td>
                    </tr>
                    <tr>
                        <td>A5</td>
                        <td><input type="text" name="nama_alternatif[]" value="Acer Swift X 14 (RTX 4050)"></td>
                        <td><input type="number" name="a5_c1" value="6"></td>
                        <td><input type="number" name="a5_c2" value="8"></td>
                        <td><input type="number" name="a5_c3" value="15"></td>
                        <td><input type="number" name="a5_c4" value="9"></td>
                        <td><input type="number" name="a5_c5" value="9"></td>
                        <td><input type="number" name="a5_c6" value="9"></td>
                    </tr>
                </tbody>
            </table>
            
            <button type="submit" class="btn">Hitung</button>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>