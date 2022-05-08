<?php namespace Tests ; ?>
<?php
trait PageTestHasPrefix {

    protected function pageRoutePrefix() :string {
        return $this->pageRoutePrefix;
    }

    protected function pageRouteGenerateWithPrefix(
        string $pageRoute
    ):string {
        return $this->pageRoutePrefix.$pageRoute;
    }

    protected function pageRouteWithPrefix():string {
        return $this->pageRouteGenerateWithPrefix($this->pageRoute);
    }
}
