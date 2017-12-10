<?php

class ImageIgosja
{
    /**
     * Resize изображения v 3.2.
     *
     * Пример использования - <img src="<?= ImageIgosja::resize($image_id, $width, $height); ?>">
     *
     * @param $image_id int Id изображения в БД
     * @param $width int Ширина нового файла
     * @param $height int Высота нового файла
     * @param $cut bool Обрезать лишнее или вставить белые полосы
     * @return string адрес jpg картинки
     */
    public static function resize($image_id, $width, $height, $cut = 1)
    {
        $sizeh = (int)$height;
        $sizew = (int)$width;
        $cut = (int)$cut;

        $o_resize = Resize::model()->findByAttributes(array('image_id' => $image_id, 'height' => $sizeh, 'width' => $sizew, 'cut' => $cut));

        if (isset($o_resize->url)) {
            return $o_resize->url;
        } else {
            $o_image = Image::model()->findByPk($image_id);

            if (isset($o_image->url)) {
                $image_url = $_SERVER['DOCUMENT_ROOT'] . $o_image->url;
                $image_info = getimagesize($image_url);
                $image_height = $image_info[1];
                $image_width = $image_info[0];
                $h_koef = $sizeh / $image_height;
                $w_koef = $sizew / $image_width;

                if (0 == $cut) {
                    if ($h_koef > $w_koef) {
                        $sizeh_new = $image_height * $w_koef;
                        $sizew_new = $sizew;
                    } else {
                        $sizew_new = $image_width * $h_koef;
                        $sizeh_new = $sizeh;
                    }
                } else {
                    if ($h_koef > $w_koef) {
                        $sizew_new = $image_width * $h_koef;
                        $sizeh_new = $sizeh;
                    } else {
                        $sizeh_new = $image_height * $w_koef;
                        $sizew_new = $sizew;
                    }
                }

                if ($image_info[2] == IMAGETYPE_GIF) {
                    $src = imagecreatefromgif($image_url);
                } elseif ($image_info[2] == IMAGETYPE_PNG) {
                    $src = imagecreatefrompng($image_url);
                } else {
                    $src = imagecreatefromjpeg($image_url);
                }

                $im = imagecreatetruecolor($sizew, $sizeh);
                $back = imagecolorallocate($im, 255, 255, 255);
                imagefill($im, 0, 0, $back);

                $file_name = substr(md5(uniqid()), -20) . '.jpg';

                $path = array();
                $path[] = substr(md5(uniqid(rand(), 1)), -3);
                $path[] = substr(md5(uniqid(rand(), 1)), -3);
                $path[] = substr(md5(uniqid(rand(), 1)), -3);

                $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . implode('/', $path);

                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, 1);
                }

                $file_url = $upload_dir . '/' . $file_name;

                if (0 == $cut) {
                    imagecopyresampled($im, $src, ($sizew - $sizew_new) / 2, ($sizeh - $sizeh_new) / 2, 0, 0, $sizew_new, $sizeh_new, imagesx($src), imagesy($src));
                } else {
                    $offset_x = ($sizew_new - $sizew) / $h_koef / 2;

                    if (0 > $offset_x) {
                        $offset_x = -$offset_x;
                    }

                    $offset_y = ($sizeh_new - $sizeh) / $w_koef / 2;

                    if (0 > $offset_y) {
                        $offset_y = -$offset_y;
                    }

                    imagecopyresampled($im, $src, 0, 0, $offset_x, $offset_y, $sizew_new, $sizeh_new, imagesx($src), imagesy($src));
                }

                if (imagejpeg($im, $file_url, 100)) {
                    chmod($file_url, 0777);
                }

                imagedestroy($im);

                $resize_url = str_replace($_SERVER['DOCUMENT_ROOT'], '', $file_url);

                $o_resize = new Resize();
                $o_resize->image_id = $image_id;
                $o_resize->url = $resize_url;
                $o_resize->width = $width;
                $o_resize->height = $height;
                $o_resize->cut = $cut;
                $o_resize->save();

                return $resize_url;
            } else {
                return '/noimage.jpg';
            }
        }
    }

    public static function put_file($file, $ext)
    {
        $file_name = substr(md5(uniqid()), -20) . '.' . $ext;

        $path = array();
        $path[] = substr(md5(uniqid(rand(), 1)), -3);
        $path[] = substr(md5(uniqid(rand(), 1)), -3);
        $path[] = substr(md5(uniqid(rand(), 1)), -3);

        $dir = '/uploads/' . implode('/', $path);
        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . $dir;

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, 1);
        }

        $file_url = $upload_dir . '/' . $file_name;

        if (!file_exists($file_url)) {
            if (copy($file, $file_url)) {
                chmod($file_url, 0777);
            }
            return $dir . '/' . $file_name;
        } else {
            return self::put_file($file, $ext);
        }
    }

    public static function put_image($file, $ext)
    {
        $file_name = substr(md5(uniqid()), -20) . '.' . $ext;

        $dir = '/upload_image/';
        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . $dir;

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, 1);
        }

        $file_url = $upload_dir . '/' . $file_name;

        if (!file_exists($file_url)) {
            if (copy($file, $file_url)) {
                chmod($file_url, 0777);
            }
            return $dir . '/' . $file_name;
        } else {
            return self::put_image($file, $ext);
        }
    }
}