<?php

require_once(__DIR__ . '/function.class.php');
/** 
 * explorateur de fichiers de  formats images, PDF et vidéos
 * affichage des miniatures de ces fichiers et dossiers
 * affichage en grand format du fichier 
 * pagination avec un PDFJS
 * système de pagination des miniatures
 **/

require_once('../config.php');
class VisualisationDocuments extends fonctions
{
    private $app;
    private $rubrique;
    private $sous_rubrique;
    private $path;
    private $liste_files;
    public $date;
    private $extension;
    private $page;
    private $numberFiles;
    private $PerPage;
    private $dossier;


    public function __construct($rubrique, $sous_rubrique, $page, $dossier)
    {
        $this->app = PROJET;
        $this->rubrique = $rubrique;
        $this->sous_rubrique = $sous_rubrique;
        $this->page = $page;
        $this->dossier = $dossier;
    }

    /**
     * vérification que le chemin existe .../rubrique/sous-rubrique/dossier
     * @return : $this->path
     */

    public function isCheminExist()
    {

        //suppression des accents présents sur les valeurs rubrique et sous-rubrique
        $this->rubrique = $this->deleteAccent($this->rubrique);
        $this->rubrique = strtolower($this->rubrique);
        if ($this->sous_rubrique === null) {
            $chemin =  '../../backoffice/documents/' . $this->app . '/medias/' . $this->rubrique . '/';
            $path = '../../backoffice/documents/' . $this->app . '/medias/' . $this->rubrique . '/';
        } else {
            $this->sous_rubrique = $this->deleteAccent($this->sous_rubrique);
            $this->sous_rubrique = strtolower($this->sous_rubrique);
            $chemin =  '../../backoffice/documents/' . $this->app . '/medias/' . $this->rubrique . '/' . $this->sous_rubrique . '/';
            $path = '../../backoffice/documents/' . $this->app . '/medias/' . $this->rubrique . '/' . $this->sous_rubrique . '/';
        }
        if ($this->dossier != null) {
            $chemin =  '../../backoffice/documents/' . $this->app . '/medias/' . $this->rubrique . '/' . $this->sous_rubrique . '/' . $this->dossier . '/';
            $path = '../../backoffice/documents/' . $this->app . '/medias/' . $this->rubrique . '/' . $this->sous_rubrique . '/' . $this->dossier . '/';
        }

        if (is_dir($chemin)) {
            $this->path = $path;
        } else {
            $this->path = 0;
        }

        return $this->path;
    }

    /**
     * vérification que le dossier existe
     * liste les fichiers dans le dossier $this->liste_files
     * @return $this->liste_files
     */

    private function isDossierExist()
    {
        if ($this->isCheminExist() !== 0) {
            $this->liste_files = array_diff(scandir($this->path, 1), array('..', '.'));
        }
        return $this->liste_files;
    }

    /**
     * récupération de l 'extension du fichier
     * @return string le format du fichier
     */

    public function GetExtension($name)
    {

        if ($this->isDossierExist()) {

            foreach ($this->liste_files as $fi) {
                if ($fi == $name) {
                    $this->extension = pathinfo($this->path . $fi, PATHINFO_EXTENSION);
                    if ($this->extension == "pdf") {
                        return "pdf";
                    } else if ($this->extension == "mp4" || $this->extension == "MP4") {
                        return "video";
                    } else {
                        return "image";
                    }
                }
            }
        }
    }


    /**
     * affichage de tous les documents en  miniatures 
     * @return div HTML
     */

    public function afficheListMiniature($filePerpage)
    {

        if ($this->isDossierExist()) {

            /**
             * affichage d'une div pour chaque fichier récupéré avec le nom de ce fichier ($nameFile)
             * affichage de la miniature du fichier si c'est une image
             * si c'est un PDF ou une vidéo : insertion d'un logo pdf / vidéo
             */

            $reajuste = 0;

            /**
             * si extension est nulle on est sur un dossier
             * affichage du bouton de retour quand on est sur un dossier
             * variable reajuste à 1 le bouton de retour reste sur toutes les pages
             */

            if ($this->dossier != null) {
                $url = "img/folder-return.png";
                $name = "Dossier parent";
                echo '<div class="content_file" data-extension=';
                echo $this->dossier . '><div class="items_multimedia" 
                        style="background-image:url(';
                echo $url . ');"></div>';
                echo '<div class="items_name">';
                echo $name;
                echo '</div></div>';
                $reajuste = 1;
            }

            foreach (array_slice($this->liste_files, $this->page * ($filePerpage - $reajuste), ($filePerpage - $reajuste)) as $file) {
                $url = "";
                $urlPdf = "";

                //récupération de l'extension
                $extension = pathinfo($this->path . $file, PATHINFO_EXTENSION);

                //récupération du nom du fichier sans l'extention
                $nameFile = explode('.', $this->deleteAccent($file));
                array_pop($nameFile);
                $name = implode('_', $nameFile);

                $file = utf8_encode($file);
                $fi = str_replace(' ', '%20', $file);

                if ($extension == "pdf" || $extension == "PDF") {
                    $url = "img/pdf.png";
                    $urlPdf = str_replace(' ', '%20', $this->path) . $fi;
                }
                if ($extension == "mp4" || $extension == "MP4") {
                    $url = "img/video.png";
                    $urlPdf = $url;
                }

                $extTabImage = ['png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF'];
                if (in_array($extension, $extTabImage)) {
                    $url = str_replace(' ', '%20', $this->path) . $fi;
                    $urlPdf = $url;
                }

                /*
                *Si l'extension est nulle c'est un dossier
                ajout d'un attribut data-extension
                */

                $extensionType = "";
                if ($extension == null) {
                    $url = "img/dossier.png";
                    $urlPdf = $url;
                    $extensionType = $file;
                    $name = $file;
                }

                echo '<div  class="content_file" name=';
                echo $fi . ' data-extension=';
                echo $extensionType . '><div name=';
                echo $urlPdf . ' class="items_multimedia" 
                        style="background-image:url(';
                echo $url . ');"></div>';
                echo '<div class="items_name">';

                echo utf8_encode($name);
                echo '</div></div>';
            }
        }
    }

    /**
     * Affichage en grand format du fichier sélectionné et renvoit à la méthode correspondant selon l'extension
     * @return div HTML
     */
    public function afficheFiles($name, $ext, $urlPdf)
    {

        if ($this->isDossierExist()) {

            foreach ($this->liste_files as $fi) {

                $file = str_replace(' ', '%20', $fi);
                $file = utf8_encode($file);
                if ($file == $name) {

                    $date = date("d/m/Y", filemtime($this->path . $fi));
                    $file = str_replace(' ', '%20', $fi);
                    $url = str_replace(' ', '%20', $this->path) . $file;

                    $ext = $this->getExtension($fi);

                    $affichage = "";
                    if ($ext == "video") {
                        $affichage = $this->afficheVideo($url);
                    } elseif ($ext == "image") {
                        $affichage = $this->afficheImage($url);
                    } else {
                        $affichage = $this->affichePDF($url, $urlPdf);
                    }
                    return
                        '<div class="dateFile"><div>Affiché depuis le : ' . $date . '</div></div>'
                        . $affichage;
                }
            }
        }
    }

    /**
     * affichage d'une vidéo
     * @return div HTML
     */

    public function afficheVideo($url)
    {
        $affichage = <<<HTML
        <div class="fiche_img">
        <video src="$url"  autoplay muted class="image_doc" controls>
        </video>
        </div>
HTML;
        return $affichage;
    }

    /**
     *affichage d'une image 
     *@return div HTML
     */

    public function afficheImage($url)
    {
        $affichage = <<<HTML
        <div class="fiche_img">
        <div class="image_doc" style="background-image:url(
         $url);"></div>
        </div>
HTML;
        return $affichage;
    }

    /**
     * affichage d'un PDF
     * @return div HTML
     */

    public function affichePdf($url, $urlPdf)
    {

        $affichage = <<<HTML
        <div class="fiche_img">
        <input type="hidden" name="$urlPdf" id="urlPdf">
            <span id="pagingPdf">Page: <span id="page_num"></span> / <span id="page_count"></span></span>
        </div>
        <script src="js/pdfjs_ES5/pdf.js"></script>
        <canvas id="the-canvas" style="border: 1px solid black; direction: ltr;"></canvas>
        <div id="directionArrows">
           <div> <img src="img/arrow-left.png" id="prev"></div>
           <div> <img src="img/arrow-right.png" id="next"></div>
        </div>
        <script src="js/configPdfjs.js"></script>
HTML;
        return $affichage;
    }
    /**
     * affichage d'un dossier
     * @return div HTML
     */

    public function afficheDossier()
    {
        $this->afficheListMiniature(6);
    }

    /**
     * pagination de l'affichage des miniatures
     */

    /**
     * récupération du nombre total de files
     */
    public function getNumberFiles()
    {
        return count($this->isDossierExist());
    }

    /**
     * récupération du nombre total de pages qu'il y aura en fonction du nombre de files à afficher par page
     * @return int nombre de pages
     */

    public function getPages($perPage)
    { //exemple: on calcule le nombre de pages total : 3 pages si 14 files et on en affiche 5 par page
        //nombre de file par page 6 
        return ceil($this->getNumberFiles() / $this->getFilePerPages($perPage));
    }

    public function getFilePerPages($filePerpage)
    {
        return $this->$filePerpage = $filePerpage;
    }

    /**
     * Lien page précédente si page actuelle est supérieur à 1
     * @return div HTML
     */

    public function previousLink($currentPage, $rub, $sousRub, $filePerpage, $dossier)
    {
        if ($currentPage <= 0) return null;
        if ($currentPage >= 1) {
            $currentPage = $currentPage - 1;
        }

        return <<<HTML
         <div class="pagePrevious" data-numberPage={$currentPage} data-sous="{$sousRub}" data-rub="{$rub}" data-dossier="{$dossier}" ></div>
HTML;
    }

    /**
     * Lien page suivante la page actuelle doit être inférieure au nombre total de pages
     * @return div HTML
     */

    public function nextLink($currentPage, $rub, $sousRub, $filePerpage, $dossier)
    {
        $pages = $this->getPages($this->$filePerpage);

        if ($this->dossier) {
            $pages = $this->getPages($this->$filePerpage - 1);
        }

        if ($currentPage >= $pages - 1) {
            return null;
        }

        $currentPage = $currentPage + 1;
        return <<<HTML
       <div class="pageNext" data-numberPage={$currentPage} data-sous="{$sousRub}" data-rub="{$rub}" data-dossier="{$dossier}"></div>
HTML;
    }
}
