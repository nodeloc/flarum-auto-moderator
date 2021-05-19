import Component from "flarum/Component";
import Button from "flarum/common/components/Button";
import Switch from "flarum/common/components/Switch";
import Tooltip from "flarum/common/components/Tooltip";
import icon from "flarum/common/helpers/icon";
import classList from "flarum/common/utils/classList";

export default class RequirementItem extends Component {
  view() {
    const requirement = this.attrs.requirement;
    const requirementDef = this.attrs.requirementDef;
    const selected = this.attrs.selected;

    return (
      <li>
        <div
          className={classList({
            "DriverListItem-info": true,
            "DriverListItem--missingExt": requirementDef.missingExt,
          })}
        >
          {requirementDef.missingExt && (
            <Tooltip
              text={app.translator.trans(
                "askvortsov-auto-moderator.admin.criterion_page.driver_missing_ext"
              )}
            >
              {icon("fas fa-exclamation-triangle")}
            </Tooltip>
          )}
          <span className="DriverListItem-name">
            {app.translator.trans(requirementDef.translationKey)}
          </span>
          {Button.component({
            className: "Button Button--link",
            icon: "fas fa-trash-alt",
            onclick: () =>
              selected(selected().filter((val) => val !== requirement)),
          })}
        </div>
        <Switch state={requirement.negated()} onchange={requirement.negated}>
          {app.translator.trans(
            "askvortsov-auto-moderator.admin.criterion_page.negated"
          )}
        </Switch>
        <hr />
      </li>
    );
  }
}
