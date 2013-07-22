rhodemap
========

WordPress theme for RhodeMap Rhode Island, based on [PlanningPress](https://github.com/openplans/planningpress). 

---

### Deploying to Production 

To push code to [rhodemap.wpengine.com](http://rhodemap.wpengine.com/), you must first [register your SSH public key with WP Engine](http://git.wpengine.com/getting-started/). Then you can deploy with the following code. 

```
$ git push wpengine-prod master
```

_Note: This assumes the remote was named `wpengine-prod` when it was configured._