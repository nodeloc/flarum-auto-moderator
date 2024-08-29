import augmentEditUserModal from "../common/augmentEditUserModal";
import registerModels from "../common/registerModels";

app.initializers.add("nodeloc/flarum-auto-moderator", () => {
  registerModels();
  //augmentEditUserModal();
});
