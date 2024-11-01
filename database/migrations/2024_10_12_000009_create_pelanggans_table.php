        <?php

        use Illuminate\Database\Migrations\Migration;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Support\Facades\Schema;

        return new class extends Migration
        {
            /**
             * Run the migrations.
             */
            public function up(): void
            {
                Schema::create('pelanggans', function (Blueprint $table) {
                    $table->id();
                    $table->string('nama_pelanggan');
                    $table->bigInteger('noWA');
                    $table->float('progressTransaksi')->nullable();
                    $table->unsignedBigInteger('id_member')->default(0);
                    $table->rememberToken();
                    $table->timestamps();
                    // $table->string('password');
                    // $table->string('profile_photo_path', 2048)->nullable();
                    
                    $table->foreign('id_member')->references('id')->on('members')->onDelete('cascade');
                });

            }

            /**
             * Reverse the migrations.
             */
            public function down(): void
            {
                Schema::dropIfExists('pelanggans');
            }
        };
