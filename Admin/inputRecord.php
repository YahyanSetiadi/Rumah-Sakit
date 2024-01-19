<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Choose a Polyclinic</title>
    <link rel="icon" href="assets/img/title.png" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <!-- my css -->
    <link rel="stylesheet" href="CSS/input.css" />
  </head>
  <body style="background-color: #eee">
    <section>
      <div class="card" style="height: 37.5rem;">
        <a href="index.php" class="btn-close" aria-label="Close" style="margin: 10px 0 0 525px"></a>
        <div class="card-body">
          <h3 class="card-title mt-2 text-center">Record <span style="color: #00cba9">Patient</span></h3>
          <form class="mx-1 mx-md-4" action="proses_inputR.php" method="post">
            <!-- NIK -->
            <div class="mb-4">
              <div class="d-flex flex-row align-items-center">
                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                  <input type="text" id="NIK" name="NIK" class="form-control" placeholder="NIK" required
                    oninvalid="this.setCustomValidity('NIK cannot be empty')"
                    oninput="setCustomValidity('')"/>
                </div>
              </div>
            </div>
            <!-- nama -->
            <div class="mb-4">
              <div class="d-flex flex-row align-items-center">
                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                  <input type="text" id="nama" name="nama" class="form-control" placeholder="Name" require/>
                </div>
              </div>
            </div>
            <!-- Tanggal -->
            <div class="mb-4">
              <div class="d-flex flex-row align-items-center">
                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                  <input
                    type="text"
                    id="tanggal"
                    name="tanggal"
                    class="form-control"
                    placeholder="Reservation Date"
                    onfocus="(this.type='date')"
                    onblur="(this.type='text')"
                    require/>
                </div>
              </div>
            </div>
            <!-- diagnisis -->
            <!-- nama -->
            <div class="mb-4">
              <div class="d-flex flex-row align-items-center">
                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                  <label for="" class="mb-1">Diagnosis</label>
                <textarea id="diagnosis" name="diagnosis" rows="4" cols="60" placeholder="Diagnosis" require>
                </textarea>
                </div>
              </div>
            </div>
            <!-- obat -->
            <div class="mb-4">
              <div class="d-flex flex-row align-items-center">
                <i class="fas fa-lock fa-lg me-1 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                <select name="obat" id="obat" class="form-control w-100 text-start">
                    <option value="0" class="text-start">Medicine</option>
                    <option value="norvask">Norvask (Poli Jantung)</option>
                    <option value="cardio aspirin">Cardio Aspirin (Poli Jantung)</option>
                    <option value="tensicap">Tensicap (Poli Jantung)</option>
                    <option value="kortikosteroid">Kortikosteroid (Poli THT)</option>
                    <option value="cevadroxil">Cevadroxil (Poli THT)</option>
                    <option value="sanmol forte">Sanmol Forte (Poli THT)</option>
                    <option value="naphazoline">Naphazoline (Poli Mata)</option>
                    <option value="tetrahydrozoline">Tetrahydrozoline (Poli Mata)</option>
                    <option value="chloramphenicol opthalmic">Chloramphenicol Opthalmic (Poli Mata)</option>
                    <option value="antidepresan">Antidepresan (Poli Psikiatri)</option>
                    <option value="anxioltic">Anxioltic (Poli Psikiatri)</option>
                    <option value="stimulan">Stimulan (Poli Psikiatri)</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- button  -->
            <div class="button-container">
              <!-- <a href="register_baru.php" type="button" class="btn" style="background-color: #00cba9">Back</a> -->
              <button type="submit" class="btn" style="background-color: #00cba9">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </section>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
