<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id_articles
 * @property string $judul
 * @property string $konten_artikel
 * @property string|null $gambar
 * @property string|null $tanggal_publish
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article whereGambar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article whereIdArticles($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article whereKontenArtikel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article whereTanggalPublish($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article whereUpdatedAt($value)
 */
	class Article extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id_carousel
 * @property string $judul
 * @property string $gambar
 * @property string|null $link
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carousel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carousel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carousel query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carousel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carousel whereGambar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carousel whereIdCarousel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carousel whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carousel whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carousel whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carousel whereUpdatedAt($value)
 */
	class Carousel extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SubCategory> $subCategories
 * @property-read int|null $sub_categories_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $no_wa
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereNoWa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereUpdatedAt($value)
 */
	class Contact extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $judul
 * @property string $deskripsi
 * @property string $step_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HowToBuy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HowToBuy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HowToBuy query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HowToBuy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HowToBuy whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HowToBuy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HowToBuy whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HowToBuy whereStepNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HowToBuy whereUpdatedAt($value)
 */
	class HowToBuy extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $sub_category_id
 * @property int $contact_id
 * @property int $category_id
 * @property string $name
 * @property string $gambar
 * @property string $serial_number
 * @property string|null $year_of_build
 * @property string|null $hours_meter
 * @property int $stock
 * @property string $harga
 * @property string|null $description
 * @property string|null $brosur
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Contact $contact
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductImage> $images
 * @property-read int|null $images_count
 * @property-read \App\Models\SubCategory $subCategory
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereBrosur($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereGambar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereHoursMeter($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereSerialNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereYearOfBuild($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $product_id
 * @property string $image_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereUpdatedAt($value)
 */
	class ProductImage extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $categories_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubCategory whereCategoriesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubCategory whereUpdatedAt($value)
 */
	class SubCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $content
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $notified
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\UlasanFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ulasan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ulasan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ulasan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ulasan whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ulasan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ulasan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ulasan whereNotified($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ulasan whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ulasan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ulasan whereUserId($value)
 */
	class Ulasan extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutRole($roles, $guard = null)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $nama_website
 * @property string|null $logo_website
 * @property string|null $tentang_kami
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WebsiteProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WebsiteProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WebsiteProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WebsiteProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WebsiteProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WebsiteProfile whereLogoWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WebsiteProfile whereNamaWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WebsiteProfile whereTentangKami($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WebsiteProfile whereUpdatedAt($value)
 */
	class WebsiteProfile extends \Eloquent {}
}

