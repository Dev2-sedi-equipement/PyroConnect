const Encore = require('@symfony/webpack-encore');

// Manually configure the runtime environment if not already configured yet by the "encore" command.
// It's useful when you use tools that rely on webpack.config.js file.
if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    // directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // public path used by the web server to access the output path
    .setPublicPath('/build')
    .copyFiles({
        from: './assets/images',
        to: 'images/[path][name].[ext]',
    })
    .addEntry('app', [
        './assets/app.js',
        './node_modules/@hotwired/turbo/dist/turbo.es2017-esm.js',
        './node_modules/@hotwired/turbo/dist/turbo.es2017-umd.js',
    ])
    .addEntry('adminUser', './assets/js/user.js')
    .addEntry('navbarJs', './assets/js/navbar.js')
    .addEntry('modifyDossier', './assets/js/modifyDossier.js')
    .addEntry('datepicker', './assets/js/datepicker.js')
    .addEntry('navbar', './assets/js/navbar.js')
    .addEntry('personnelTirEdit', './assets/js/personnelTirEdit.js')
    .addEntry('personnelTir', './assets/js/personnelTir.js')
    .addEntry('beforeUnload', './assets/js/beforeUnload.js')
    .addEntry('personnelTirArchive', './assets/js/personnelTirArchive.js')
    .addEntry('searchClient', './assets/js/searchClient.js')
    .addEntry('createDossier', './assets/js/createDossier.js')
    .addEntry('password-visible', './assets/js/password-visibility.js')
    .addStyleEntry('noAccessFile', './assets/styles/pages/noAccessFile.scss')
    .enableStimulusBridge('./assets/controllers.json')
    .splitEntryChunks()
    .enableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    // .configureBabel((config) => {
    //     config.plugins.push('@babel/a-babel-plugin');
    // })
    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = '3.23';
    })
    .enableSassLoader()
;

module.exports = Encore.getWebpackConfig();
